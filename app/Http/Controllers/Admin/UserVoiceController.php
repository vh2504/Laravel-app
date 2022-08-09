<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserVoice;
use App\Services\Admin\UserVoiceService;
use App\Validators\UserVoiceValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserVoiceController extends Controller
{
    /**
     * contructor
     *
     * @param UserVoiceService   $service
     * @param UserVoiceValidator $validator
     * @return void
     */
    public function __construct(
        protected readonly UserVoiceService $service,
        protected readonly UserVoiceValidator $validator
    ) {
    }

    /**
     * Display a listing of the uservoice.
     * @param \Illuminate\Http\Request $request
     * @return View|Factory
     */
    public function index(Request $request): View|Factory
    {
        $dataIndex = $this->service->index($request);
        $userVoices = Arr::get($dataIndex, 'userVoices', []);

        return view('userVoices.index', compact('userVoices'));
    }

    /**
     * Detail uservoice
     * @param UserVoice $userVoice
     * @return View|Factory
     */
    public function show(UserVoice $userVoice): View|Factory
    {
        return view('userVoices.show', compact('userVoice'));
    }

    /**
     * Update Popular uservoice
     *
     * @param Request   $request
     * @param UserVoice $userVoice
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function updatePopular(Request $request, UserVoice $userVoice): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $isUpdate = $this->service->updatePopular($userVoice, (int)$request->is_popular);
            if (!$isUpdate) {
                return redirect()->back()->with('error', __('userVoice.validations.is_popular.max'));
            }

            return redirect()->back()->with('success', __('userVoice.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Delete uservoice
     * @param UserVoice $userVoice
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(UserVoice $userVoice): JsonResponse
    {
        $data = [
            'status' => 200,
            'message' => __('post.messages.delete-success'),
        ];
        try {
            $this->service->destroy($userVoice);
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }
}
