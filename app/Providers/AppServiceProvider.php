<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Basic;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        View::composer(['layouts.frontend.partial.navbar', 'layouts.frontend.partial.footer','post_details','search_view'], function ($view) {
            $categories = Category::orderBy('name')->get();
            $view->with('categories', $categories);
        });

        View::composer([ 'post_details','search_view'], function ($view) {
            $tags = Tag::orderBy('name')->get();
            $view->with('tags', $tags);
        });

        View::composer(['layouts.frontend.partial.footer'], function ($view) {
            $popular_posts = Post::withCount('comments')
                               ->orderBy('comments_count', 'DESC')
                               ->orderBy('view_count')
                               ->published()
                               ->active()
                               ->take(3)
                               ->get();
            $view->with('popular_posts', $popular_posts);
        });

        View::composer(['layouts.frontend.partial.footer', 'layouts.frontend.partial.header','layouts.backend.partial.header', 'layouts.frontend.partial.navbar'], function ($view) {
            $basic = Basic::first();
            $view->with('basic', $basic);
        });
    }
}
