<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $cat = Category::all();
        $allPosts = Post::with('category')->latest()->take(4)->get();

        $user = User::find(1);
        $unreadNotifications = $user->unreadNotifications()->paginate(5);
        View::share('cat', $cat);
        View::share('allPosts', $allPosts);
        View::share('unreadNotifications', $unreadNotifications);
        Paginator::useBootstrap();
    }
}
