<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Repositories as L5Repositories;
use App\Repositories\Eloquent as L5Eloquent;

/**
 * Class RepositoryServiceProvider
 *
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            L5Repositories\CategoryRepository::class,
            L5Eloquent\CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobCollectionRepository::class,
            L5Eloquent\JobCollectionRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobCategoryRepository::class,
            L5Eloquent\JobCategoryRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobRepository::class,
            L5Eloquent\JobRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobCategoryJobCollectionRepository::class,
            L5Eloquent\JobCategoryJobCollectionRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\UserAdminRepository::class,
            L5Eloquent\UserAdminRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\OfficeTypeRepository::class,
            L5Eloquent\OfficeTypeRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobCategoryOfficeRepository::class,
            L5Eloquent\JobCategoryOfficeRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\PostRepository::class,
            L5Eloquent\PostRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\UserRepository::class,
            L5Eloquent\UserRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\AdminRepository::class,
            L5Eloquent\AdminRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\FeatureRepository::class,
            L5Eloquent\FeatureRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\NoticeRepository::class,
            L5Eloquent\NoticeRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\FeatureJobCategoryRepository::class,
            L5Eloquent\FeatureJobCategoryRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\UserVoiceRepository::class,
            L5Eloquent\UserVoiceRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobImageRepository::class,
            L5Eloquent\JobImageRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\AdminRepository::class,
            L5Eloquent\AdminRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobFeatureRepository::class,
            L5Eloquent\JobFeatureRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\CityRepository::class,
            L5Eloquent\CityRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\PrefectureRepository::class,
            L5Eloquent\PrefectureRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\PostalCodeRepository::class,
            L5Eloquent\PostalCodeRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\PasswordResetRepository::class,
            L5Eloquent\PasswordResetRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\UserRepository::class,
            L5Eloquent\UserRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\StationRepository::class,
            L5Eloquent\StationRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\LineRepository::class,
            L5Eloquent\LineRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\LineStationRepository::class,
            L5Eloquent\LineStationRepositoryEloquent::class
        );
        $this->app->bind(
            L5Repositories\JobLineStationRepository::class,
            L5Eloquent\JobLineStationRepositoryEloquent::class
        );
        //:end-bindings:
    }
}
