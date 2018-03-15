<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\Topic;
use App\Observers\topicObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('zh');

        //视图合成器
        View::composer(
            'layouts._header', 'App\Http\ViewComposers\NavbarComposer' //导航栏数据
        );

        //模型观察器
        Topic::observe(topicObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
