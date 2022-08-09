<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin as AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->group(function () {
    Route::get('', function () {
        return redirect(route('get-admin-login'));
    })->name('home-admin');

    Route::group(['prefix' => '', 'middleware' => 'theme:admin'], function () {
        Route::get('/login', 'AuthController@showLoginForm')->name('get-admin-login');
        Route::post('/login', 'AuthController@login')->name('admin-login');
        Route::get('/login', 'AuthController@showLoginForm')->name('admin.auth.login');
        Route::post('/login', 'AuthController@login')->name('admin.auth.post.login');

        Route::get('/register', 'AuthController@register')->name('get-admin-register');
        Route::post('/register', 'AuthController@postRegister')->name('admin-register');

        /**
         * route temp for fix error
         */
        Route::post('temp',  function () {
            return 'route temp for fix error';
        })->name('page.index');


        Route::group(['middleware' => ['auth:admin']], function () {
            Route::get('/logout', 'AuthController@logout')->name('admin-logout');
            Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
            Route::post('/set-limit-page', 'HomeController@setLimitPage')->name('admin.set-limit-page');


            # Multiple language
            Route::get('lang', 'HomeController@setLang')->name('admin.home.lang')->whereIn('code',['ja','vi']);

            Route::prefix('admin-management')->group(function() {
                Route::get('index', [AdminController\AdminController::class, 'search'])->name('admin.admin.management.index');
                Route::get('create', [AdminController\AdminController::class, 'create'])->name('admin.admin.management.create');
                Route::post('store', [AdminController\AdminController::class, 'store'])->name('admin.admin.management.store');
                Route::get('edit/{id}', [AdminController\AdminController::class, 'edit'])->name('admin.admin.management.edit');
                Route::post('update/{id}', [AdminController\AdminController::class, 'update'])->name('admin.admin.management.update');
                Route::delete('destroy/{id}', [AdminController\AdminController::class, 'destroy'])->name('admin.admin.management.destroy');
            });

            /**
             * Post Management
             */
            Route::prefix('posts')->group(function () {
                Route::get('index', [AdminController\PostController::class, 'index'])->name('admin.posts.index');
                Route::post('uploadFile', [AdminController\PostController::class, 'uploadFile'])->name('admin.posts.upload-file');
                Route::get('create', [AdminController\PostController::class, 'create'])->name('admin.posts.create');
                Route::post('store', [AdminController\PostController::class, 'store'])->name('admin.posts.store');
                Route::get('{post}', [AdminController\PostController::class, 'show'])->name('admin.posts.show');
                Route::get('edit/{post}', [AdminController\PostController::class, 'edit'])->name('admin.posts.edit');
                Route::put('update/{post}', [AdminController\PostController::class, 'update'])->name('admin.posts.update');
                Route::put('confirm/{post}', [AdminController\PostController::class, 'superAdminConfirm'])->name('admin.posts.confirm');
                Route::put('/popular/{id}', [AdminController\PostController::class, 'popular'])->name('admin.posts.popular');
                Route::delete('destroy/{post}', [AdminController\PostController::class, 'destroy'])->name('admin.posts.destroy');
            });

            /**
             * Features Management
             */
            Route::prefix('features')->group(function () {
                Route::get('index', [AdminController\FeatureController::class, 'index'])->name('admin.features.index');
                Route::get('create', [AdminController\FeatureController::class, 'create'])->name('admin.features.create');
                Route::post('store', [AdminController\FeatureController::class, 'store'])->name('admin.features.store');
                Route::get('edit/{feature}', [AdminController\FeatureController::class, 'edit'])->name('admin.features.edit');
                Route::put('update/{feature}', [AdminController\FeatureController::class, 'update'])->name('admin.features.update');
                Route::put('popular/{id}', [AdminController\FeatureController::class, 'popular'])->name('admin.features.popular');
                Route::delete('destroy/{feature}', [AdminController\FeatureController::class, 'destroy'])->name('admin.features.destroy');
            });

            /**
             * Notices Management
             */
            Route::prefix('notices')->group(function () {
                Route::get('index', [AdminController\NoticeController::class, 'index'])->name('admin.notices.index');
                Route::get('create', [AdminController\NoticeController::class, 'create'])->name('admin.notices.create');
                Route::post('store', [AdminController\NoticeController::class, 'store'])->name('admin.notices.store');
                Route::get('edit/{notice}', [AdminController\NoticeController::class, 'edit'])->name('admin.notices.edit');
                Route::put('update/{notice}', [AdminController\NoticeController::class, 'update'])->name('admin.notices.update');
                Route::delete('destroy/{notice}', [AdminController\NoticeController::class, 'destroy'])->name('admin.notices.destroy');
            });

            /**
             * User Voice Management
             */
            Route::prefix('userVoices')->group(function () {
                Route::get('index', [AdminController\UserVoiceController::class, 'index'])->name('admin.userVoices.index');
                Route::get('{userVoice}', [AdminController\UserVoiceController::class, 'show'])->name('admin.userVoices.show');
                Route::put('popular/{userVoice}', [AdminController\UserVoiceController::class, 'updatePopular'])->name('admin.userVoices.popular');
                Route::delete('destroy/{userVoice}', [AdminController\UserVoiceController::class, 'destroy'])->name('admin.userVoices.destroy');
            });

            /**
             * Collections
             */
            Route::prefix('collections')->group(function () {
                Route::get('index', [AdminController\CollectionController::class, 'index'])->name('admin.collection.index');
                Route::get('create', [AdminController\CollectionController::class, 'create'])->name('admin.collection.create');
                Route::post('store', [AdminController\CollectionController::class, 'store'])->name('admin.collection.store');
                Route::get('/edit/{collection}', [AdminController\CollectionController::class, 'edit'])->name('admin.collection.edit');
                Route::patch('update/{id}', [AdminController\CollectionController::class, 'update'])->name('admin.collection.update');
                Route::delete('/delete/{collection}', [AdminController\CollectionController::class, 'delete'])->name('admin.collection.delete');
            });

            /**
             * User Management
             */
            Route::prefix('user')->group(function() {
                Route::get('index', [AdminController\UserController::class, 'index'])->name('admin.user.index');
                Route::get('export', [AdminController\UserController::class, 'export'])->name('admin.user.export');
                Route::get('show/{id}', [AdminController\UserController::class, 'show'])->name('admin.user.show');
                Route::put('change-status/{id}/{status}', [AdminController\UserController::class, 'changeStatus'])->name('admin.user.change-status');
            });

            Route::prefix('images')->group(function (){
                Route::post('upload',[AdminController\ImageController::class, 'uploadFileCkeditor'])->name('admin.images.upload-image-ckeditor');
            });

            /**
             * Job Category
             */
            Route::prefix('job-categories')->group(function () {
                Route::get('index', [AdminController\JobCategoryController::class, 'index'])->name('admin.job-categories.index');
                Route::get('create', [AdminController\JobCategoryController::class, 'create'])->name('admin.job-categories.create');
                Route::post('store', [AdminController\JobCategoryController::class, 'store'])->name('admin.job-categories.store');
                Route::get('/edit/{category}', [AdminController\JobCategoryController::class, 'edit'])->name('admin.job-categories.edit');
                Route::patch('update/{id}', [AdminController\JobCategoryController::class, 'update'])->name('admin.job-categories.update');
                Route::put('/popular/{id}', [AdminController\JobCategoryController::class, 'popular'])->name('admin.job-categories.popular');
                Route::delete('/delete/{category}', [AdminController\JobCategoryController::class, 'delete'])->name('admin.job-categories.delete');
            });

            /**
             * Category Management
             */
            Route::prefix('categories')->group(function () {
                Route::get('index', [AdminController\CategoryController::class, 'index'])->name('admin.categories.index');
                Route::get('create', [AdminController\CategoryController::class, 'create'])->name('admin.categories.create');
                Route::post('store', [AdminController\CategoryController::class, 'store'])->name('admin.categories.store');
                Route::get('/edit/{category}', [AdminController\CategoryController::class, 'edit'])->name('admin.categories.edit');
                Route::put('update/{category}', [AdminController\CategoryController::class, 'update'])->name('admin.categories.update');
                Route::delete('destroy/{post}', [AdminController\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
            });

            /**
             * Job management
             */
            Route::prefix('jobs')->group(function () {
                Route::get('index', [AdminController\JobController::class, 'index'])->name('admin.job.index');
                Route::get('create', [AdminController\JobController::class, 'create'])->name('admin.job.create');
                Route::post('store', [AdminController\JobController::class, 'store'])->name('admin.job.store');
                Route::get('/edit/{jobs}', [AdminController\JobController::class, 'edit'])->name('admin.job.edit');
                Route::patch('update/{id}', [AdminController\JobController::class, 'update'])->name('admin.job.update');
                Route::put('/popular/{id}', [AdminController\JobController::class, 'popular'])->name('admin.job.popular');
                Route::delete('/delete/{jobs}', [AdminController\JobController::class, 'delete'])->name('admin.job.delete');
                Route::get('suggest-prefectures', [AdminController\JobController::class, 'suggestPrefectures'])->name('admin.job.suggest.prefecture');
                Route::get('suggest-cities', [AdminController\JobController::class, 'suggestCities'])->name('admin.job.suggest.city');
                Route::get('suggest-line', [AdminController\JobController::class, 'suggestLine'])->name('admin.job.suggest.line');
                Route::get('suggest-station', [AdminController\JobController::class, 'suggestStation'])->name('admin.job.suggest.station');
            });
        });
    });
});
