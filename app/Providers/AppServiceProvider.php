<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

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
        
        if (!Cache::has('attendance_last_run')) {
            Artisan::call('attendance:auto-mark');
            Cache::put('attendance_last_run', now(), 60); // run once per minute
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
