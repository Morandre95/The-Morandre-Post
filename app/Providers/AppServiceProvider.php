<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use App\Models\Consoles;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        if(Schema::hasTable('categories')) {
            $categories =Category::all();
            View::share(['categories' => $categories]);
        }
        if(Schema::hasTable('tags')) {
            $tags =Tag::all();
            View::share(['tags' => $tags]);
        }
        if(Schema::hasTable('consoles')) {
            $consoles =Consoles::all();
            View::share(['consoles' => $consoles]);
        }
        if(Schema::hasTable('articles')) {
            $articles =Article::all();
            View::share(['articles' => $articles]);
        }
    }
}