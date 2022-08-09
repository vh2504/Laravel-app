<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User\ETypeAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageRequest;
use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Http\Requests\Admin\Post\SuperAdminConfirmRequest;
use App\Models\Admin;
use App\Models\Post;
use App\Services\Admin\PostService;
use App\Validators\PostValidator;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostController extends Controller
{
    /**
     * contructor
     *
     * @param PostService   $service
     * @param PostValidator $validator
     * @return void
     */
    public function __construct(
        protected readonly PostService $service,
        protected readonly PostValidator $validator
    ) {
    }

    /**
     * Display a listing of the Post.
     * @param Request $request
     * @return View|Factory
     */
    public function index(Request $request): View|Factory
    {
        $dataIndex = $this->service->index($request);
        $posts = Arr::get($dataIndex, 'posts', []);
        $categories = Arr::get($dataIndex, 'categories', []);
        $listStatus = Arr::get($dataIndex, 'listStatus', []);

        return view('posts.index', compact('posts', 'categories', 'listStatus'));
    }

    /**
     * Display a creating of the Post.
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        /** @var Admin $admin */
        $admin = Auth::user();
        $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;

        $dataCreate = $this->service->getDataFormPost();
        $categories = Arr::get($dataCreate, 'categories', []);
        $hastags = Arr::get($dataCreate, 'hastags', []);
        $listStatus = Arr::get($dataCreate, 'listStatus', []);

        return view('posts.create', compact('categories', 'hastags', 'listStatus', 'isSuperAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreatePostRequest $request): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request->all());

            return redirect()->route('admin.posts.index')->with('success', __('post.messages.create-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * updaload file in storage.
     *
     * @param ImageRequest $request
     *
     * @return JsonResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function uploadFile(ImageRequest $request): JsonResponse
    {
        $data = [
            'success' => 1,
            'message' => 'upload success',
            'data' => null
        ];
        try {
            $file = $request->file('file');
            /** @var UploadedFile $file */
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $dir = "public/posts";
            Storage::putFileAs($dir, $file, $fileName);
            $data['data'] = asset('storage/posts/' . $fileName);
        } catch (\Throwable $th) {
            $data['success'] = 0;
            $data['message'] = $th->getMessage();
        }//end try

        return response()->json($data);
    }

    /**
     * Detail post
     * @param Post $post
     * @return View|Factory
     */
    public function show(Post $post): View|Factory
    {
        /** @var Admin $admin */
        $admin = Auth::user();
        $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;
        $dataCreate = $this->service->getDataFormPost();

        return view('posts.show', compact('post', 'isSuperAdmin'));
    }

    /**
     * Confirm by Super Admin
     * @param SuperAdminConfirmRequest $request
     * @param Post                     $post
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function superAdminConfirm(SuperAdminConfirmRequest $request, Post $post): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(PostValidator::RULE_SUPER_ADMIN_CONFIRM);
            $this->service->superAdminConfirm($request->all(), $post);

            return redirect()->route('admin.posts.index')->with('success', __('post.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Display a creating of the Post.
     * @param Post $post
     * @return View|Factory|RedirectResponse
     * @throws \Throwable
     */
    public function edit(Post $post): View|Factory|RedirectResponse
    {
        try {
            /** @var Admin $admin */
            $admin = Auth::user();
            $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;

            if (!($isSuperAdmin || Auth::id() == $post->creator_id)) {
                throw new Exception('Permission denied', 403);
            }
            $dataCreate = $this->service->getDataFormPost();
            $categories = Arr::get($dataCreate, 'categories', []);
            $hastags = Arr::get($dataCreate, 'hastags', []);
            $listStatus = Arr::get($dataCreate, 'listStatus', []);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }//end try

        return view('posts.edit', compact('post', 'categories', 'hastags', 'listStatus', 'isSuperAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @param Post              $post
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CreatePostRequest $request, Post $post): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->service->update($request->all(), $post);

            return redirect()
                ->route('admin.posts.show', $post->id)
                ->with('success', __('post.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function popular(int $id): JsonResponse
    {
        return \response()->json([
            'status' => $this->service->popular($id)
        ]);
    }

    /**
     * Delete post
     * @param Post $post
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(Post $post): JsonResponse
    {
        $data = [
            'status' => 200,
            'message' => __('post.messages.delete-success'),
        ];
        try {
            /** @var Admin $admin */
            $admin = Auth::user();
            $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;

            if (!($isSuperAdmin || Auth::id() == $post->creator_id)) {
                throw new Exception('Permission denied', 403);
            }
            $this->service->destroy($post);
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }
}
