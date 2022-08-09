<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\SendMailResetRequest;
use App\Services\User\PasswordResetService;
use App\Services\User\UserService;
use App\Notifications\ResetPasswordNotify;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use AuthenticatesUsers;

    /**
     * contructor
     *
     * @param PasswordResetService $service
     * @param UserService          $userService
     * @return void
     */
    public function __construct(
        protected readonly PasswordResetService $service,
        protected readonly UserService $userService
    ) {
    }

    /**
     * resetPassword
     *
     * @return View|Factory
     */
    public function resetPassword(): View|Factory
    {
        return view('auth.passwords.reset');
    }

    /**
     * sendMailResetPassword
     *
     * @param SendMailResetRequest $request
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function sendMailResetPassword(SendMailResetRequest $request)
    {
        $email = $request->email;

        $user = $this->userService->getUserByEmail((string)$email);
        if (empty($user)) {
            return redirect()->back()->with('error', __('reset-frontend.messages.error'));
        }

        $passwordReset = $this->service->getPasswordResetByEmail((string)$email);
        $token = Str::random(60);
        if (empty($passwordReset)) {
            $data = [
                'email' => (string)$email,
                'token' => $token,
                'created_at' => Carbon::now()
            ];
            $this->service->createToken($data);
        } else {
            $dataUpdate = [
                'token' => $token,
                'created_at' => Carbon::now()
            ];
            $this->service->updateToken($dataUpdate, (string)$email);
        }

        //Send mail
        $user->notify((new ResetPasswordNotify($token))->locale('jp'));

        return redirect()->route('reset-password-success')
                         ->with('success-reset', __('reset-frontend.messages.success-reset'));
    }

    /**
     * formResetPassword
     *
     * @param string $token
     *
     * @return View|Factory
     */
    public function formResetPassword(string $token): View|Factory
    {
        return view('auth.passwords.form-reset', ['token' => $token]);
    }

    /**
     * reset
     *
     * @param ResetPasswordRequest $request
     * @param string               $token
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function reset(ResetPasswordRequest $request, string $token)
    {
        $passwordReset = $this->service->getPasswordResetByToken((string) $token);
        if (empty($passwordReset)) {
            return redirect()->route('get-login')->with('success-reset', __('reset-frontend.messages.success-form'));
        }

        if (Carbon::parse($passwordReset->created_at)->addMinutes(1)->isPast()) {
            $this->service->destroyByToken((string)$token);

            return redirect(route('get-reset-password'))->with('error', __('reset-frontend.messages.error-form'));
        }

        //Update password
        $dataUpdae = [
            'password' => bcrypt((string)$request->password)
        ];
        $this->userService->updatePassword($dataUpdae, $passwordReset->email);

        $this->service->destroyByEmail((string)$passwordReset->email);

        $login = [
            'email' => $passwordReset->email,
            'password' => $request->password
        ];
        if (Auth::guard()->attempt($login)) {
            return redirect()->route('top')->with('success', __('top.alert.success'));
        } else {
            return redirect()->route('get-login');
        }
    }

    /**
     * resetPasswordSuccess
     *
     * @return View|Factory
     */
    public function resetPasswordSuccess(): View|Factory
    {
        return view('auth.passwords.success-reset');
    }
}
