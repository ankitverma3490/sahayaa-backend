<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        // ✅ Prevent DB queries during CLI / Composer / Build
        if (app()->runningInConsole()) {
            return;
        }

        $youtube   = Setting::where('key','Social.youtube')->first();
        $facebook  = Setting::where('key','Social.facebook')->first();
        $twitter   = Setting::where('key','Social.twitter')->first();
        $linkedin  = Setting::where('key','Social.linkedin')->first();
        $copyright = Setting::where('key','Site.right')->first();

        View::share(compact(
            'youtube',
            'facebook',
            'twitter',
            'linkedin',
            'copyright'
        ));
    }
}
