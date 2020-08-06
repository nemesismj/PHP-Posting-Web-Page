<?php

namespace App\Providers;

use App\Http\Controllers\LikeService;
use App\Http\Controllers\PostService;
use App\Http\Controllers\UserService;
use App\Interfaces\LikeServiceInterface;
use App\Interfaces\PostServiceInterface;
use App\Interfaces\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(LikeServiceInterface::class, function () {
            return new LikeService();
        });
        $this->app->bind(PostServiceInterface::class, function () {
            return new PostService();
        });
        $this->app->bind(UserServiceInterface::class, function () {
            return new UserService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
