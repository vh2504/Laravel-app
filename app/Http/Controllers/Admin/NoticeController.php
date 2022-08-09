<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notice\CreateNoticeRequest;
use App\Models\Notice;
use App\Services\Admin\NoticeService;
use App\Validators\NoticeValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class NoticeController extends Controller
{
    /**
     * contructor
     *
     * @param NoticeService   $service
     * @param NoticeValidator $validator
     * @return void
     */
    public function __construct(
        protected readonly NoticeService $service,
        protected readonly NoticeValidator $validator
    ) {
    }

    /**
     * Display a listing of the notice.
     * @param \Illuminate\Http\Request $request
     * @return View|Factory
     */
    public function index(Request $request): View|Factory
    {
        $dataIndex = $this->service->index($request);
        $notices = Arr::get($dataIndex, 'notices', []);
        $jobCategories = Arr::get($dataIndex, 'jobCategories', []);
        $listTypeGroup = Arr::get($dataIndex, 'listTypeGroup', []);

        return view('notices.index', compact('notices', 'jobCategories', 'listTypeGroup'));
    }

    /**
     * Display a creating of the Notice.
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        return view('notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoticeRequest $request
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateNoticeRequest $request): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request->all());

            return redirect()->route('admin.notices.index')->with('success', __('notice.messages.create-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Display a editing of the notice.
     * @param Notice $notice
     *
     * @return Factory|View
     */
    public function edit(Notice $notice): Factory|View
    {
        return view('notices.edit', compact('notice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoticeRequest $request
     * @param Notice              $notice
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CreateNoticeRequest $request, Notice $notice): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->update($request->all(), $notice);

            return redirect()->route('admin.notices.index')->with('success', __('notice.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Delete notice
     * @param Notice $notice
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(Notice $notice): JsonResponse
    {
        $data = [
            'status' => 200,
            'message' => __('post.messages.delete-success'),
        ];
        try {
            $this->service->destroy($notice);
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }
}
