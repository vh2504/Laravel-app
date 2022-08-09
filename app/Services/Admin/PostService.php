<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\JobCategoryRepository;
use App\Contracts\Repositories\PostRepository;
use App\Enums\Post\EPostStatus;
use App\Enums\User\ETypeAdmin;
use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

/**
 * This is class Post Service
 */
class PostService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\PostRepository        $repository
     * @param \App\Contracts\Repositories\CategoryRepository    $repositoryCategory
     * @param \App\Contracts\Repositories\JobCategoryRepository $repositoryJobCategory
     * @return void
     */
    public function __construct(
        protected readonly PostRepository $repository,
        protected readonly CategoryRepository $repositoryCategory,
        protected readonly JobCategoryRepository $repositoryJobCategory
    ) {
    }

    /**
     * Display a listing of the Post.
     * @param \Illuminate\Http\Request $request
     * @return array<mixed>
     */
    public function index(Request $request): array
    {
        $posts = $this->repository->search([
            'status' => $request->status,
            'title' => $request->title,
            'category' => $request->category
        ]);
        $categories = $this->repositoryCategory->all();
        $listStatus = EPostStatus::cases();

        return compact('posts', 'categories', 'listStatus');
    }

    /**
     * Show the form for creating or updating resource.
     *
     * @return array<string, mixed>
     */
    public function getDataFormPost(): array
    {
        $categories = $this->repositoryCategory->all();
        $hastags = $this->repositoryJobCategory->all();
        $listStatus = [
            ['name' => __('post.status.NotPulished'), 'value2' => 1, 'value' => EPostStatus::Approved->value],
            ['name' => __('post.status.Published'), 'value2' => 2, 'value' =>  EPostStatus::Approved->value],
            ['name' => __('post.status.Hidden'), 'value2' => 3, 'value' => EPostStatus::Hidden->value]
        ];

        return compact('categories', 'hastags', 'listStatus');
    }

    /**
     * Store Post
     *
     * @param array $dataRequest
     *
     * @return Post
     */
    public function store(array $dataRequest): Post
    {
        $dataRequest['creator_id'] = Auth::id();
        /** @var Admin $admin */
        $admin = Auth::user();
        $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;
        if (!isset($dataRequest['status']) && $isSuperAdmin) {
            $dataRequest['status'] = EPostStatus::Approved->value;
        }
        $post = $this->repository->create($dataRequest);
        /** @var Post $post */
        $post->jobCategories()->attach(Arr::get($dataRequest, 'job_category_ids', []));
        $post->categories()->attach($dataRequest['category_id']);

        return $post;
    }

    /**
     * update Post
     *
     * @param array $dataRequest
     * @param Post  $post
     * @return Post
     */
    public function update(array $dataRequest, Post $post): Post
    {
        /** @var Admin $admin */
        $admin = Auth::user();
        $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;
        if ($isSuperAdmin) {
            switch (Arr::get($dataRequest, 'status', '')) {
                case EPostStatus::Approved->value:
                    $dataRequest['status'] = EPostStatus::Approved;
                    break;
                case EPostStatus::Hidden->value:
                    $dataRequest['status'] = EPostStatus::Hidden;
                    break;
                default:
                    $dataRequest['status'] = $post->status;
                    break;
            }
        } else {
            $dataRequest['status'] = EPostStatus::Pending;
        }
        $post->update($dataRequest);
        /** @var Post $post */
        $post->jobCategories()->detach();
        $post->categories()->detach();
        $post->jobCategories()->attach(Arr::get($dataRequest, 'job_category_ids', []));
        $post->categories()->attach($dataRequest['category_id']);

        return $post;
    }

    /**
     * Super Admin Confirm Post
     * @param array $dataRequest
     * @param Post  $post
     *
     * @return Post
     */
    public function superAdminConfirm(array $dataRequest, Post $post): Post
    {
        $status = Arr::get($dataRequest, 'status', '');
        $publishedAt = Arr::get($dataRequest, 'published_at', '');
        $reason = Arr::get($dataRequest, 'reason', '');
        switch ($status) {
            case EPostStatus::Approved->value:
                $post->status = EPostStatus::Approved;
                $post->published_at = (string) $publishedAt;
                $post->save();
                break;
            case EPostStatus::Rejected->value:
                $post->status = EPostStatus::Rejected;
                $post->reason = (string) $reason;
                $post->save();
                break;
        }

        return $post;
    }

    /**
     * Delete post
     * @param Post $post
     *
     * @return boolean|null
     */
    public function destroy(Post $post): bool|null
    {
        return $post->delete();
    }

    /**
     * Update Popular post
     * @param Post $post
     * @param int  $isPopular
     *
     * @return boolean
     */
//    public function updatePopular(Post $post, int $isPopular): bool
//    {
//        if ($isPopular && $this->repository->getCountPopular() >= Post::MAX_POPULAR) {
//            return false;
//        }
//        $post->is_popular = $isPopular;
//        $post->save();
//
//        return true;
//    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function popular(int $id): bool
    {
        $model = $this->repository->find($id);
        if ($model instanceof Post) {
            $value = ($model->is_popular ? 0 : 1);
            $this->repository->update(['is_popular' => $value], $id);

            return boolval($value);
        }

        return false;
    }
}
