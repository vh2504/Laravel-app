<?php

namespace App\Http\Controllers\User;

use App\Enums\User\EStepRegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Services\User\UserService;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     *
     * @return void
     */
    public function __construct(
        protected readonly UserService $userService
    )
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * showLoginForm
     *
     * @return View|RedirectResponse
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if ($this->guard()->check()) {
            return redirect()->route('top')->with('success', __('top.alert.success'));
        }

        return view('auth.login');
    }

    /**
     * login
     *
     * @param LoginRequest $request
     * @return Redirector|RedirectResponse
     */
    public function login(LoginRequest $request): Redirector|RedirectResponse
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard()->attempt($login)) {
            return redirect()->route('top')->with('success', __('top.alert.success'));
        } else {
            return redirect()->back()->with('error', __('login-frontend.messages.error'));
        }
    }

    /**
     * register
     *
     * @return View|Factory
     */
    public function register(): View|Factory
    {
        return view('auth.registers.show');
    }

    /**
     * postRegisterStep
     *
     * @param UserRegisterRequest $request
     * @param string              $step
     *
     * @return JsonResponse
     *
     * @throws \Throwable
     */
    public function postRegisterStep(UserRegisterRequest $request, string $step)
    {
        $data = [
            'status' => 200,
            'message' => __('register-frontend.messages.step1-success'),
        ];
        try {
            switch ($step) {
                case EStepRegisterUser::Step1->name:
                    $emailUnique = $this->userService->getUserByEmail((string)$request->email);
                    if (!empty($emailUnique)) {
                        $data['message'] = __('register-frontend.messages.step-error');
                        $data['emailUnique'] = __('register-frontend.messages.email-unique');
                    } else {
                        $data['storeDataStep1'] = $this->getDataStep($request, $step);
                    }
                    break;
                case EStepRegisterUser::Step2->name:
                    $data['storeDataStep2'] = $this->getDataStep($request, $step);
                    break;
                default:
                    throw new Exception((string)__('register-frontend.messages.error-page'), 400);
            }
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }

    /**
     * logout
     *
     * @return View|Factory
     */
    public function logout(): View|Factory
    {
        Auth::guard()->logout();
        return view('auth.login');
    }

    /**
     * getDataStep
     *
     * @param Request $request
     * @param string  $step
     *
     * @return array
     */
    private function getDataStep(Request $request, string $step): array
    {
        $data = [];
        switch ($step) {
            case EStepRegisterUser::Step1->name:
                $data = $request->only(
                    'email',
                    'password',
                    'password_confirmation'
                );
                break;
            case EStepRegisterUser::Step2->name:
                $data = $request->only(
                    'first_name',
                    'last_name',
                    'first_name_hira',
                    'last_name_hira',
                    'birthday_year',
                    'birthday_month',
                    'birthday_day',
                    'gender',
                    'zipcode',
                    'prefecture',
                    'city',
                    'address',
                    'town',
                    'number_phone',
                    'job_situation'
                );
                break;
            default:
                break;
        }
        return $data;
    }

    /**
     * getPrefectures
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrefectures(): JsonResponse
    {
        return response()->json([
            'values' => $this->userService->getPrefectures()
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestCities(Request $request): JsonResponse
    {
        return response()->json([
            'values' => $this->userService->suggestCities((int)$request->q)
        ]);
    }
}
