<?php

namespace App\Providers;

use App\Model\Config;
use App\Observers\ConfigObserver;
use App\Server\TagServer;
use Houdunwang\Aliyun\Aliyun;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(TagServer $tagServer)
    {
        //
        Schema::defaultStringLength(191);
        $this->loadConfig();
//      Config数据库 observe监测数据库改变 (使用ConfigObserver里的方法来监测)
        Config::observe(ConfigObserver::class);
        \Carbon\Carbon::setLocale('zh');
        $tagServer->make();
    }
    protected function loadConfig(){
        Aliyun::config([
            'regionId'  => \config ('hd_aliyun.regionId'),
            'accessId'  => \config ('hd_aliyun.accessId'),
            'accessKey' =>\config ('hd_aliyun.accessKey'),
        ]);
    }
    /**
     * Register any applicatiocn services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
