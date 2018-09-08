<?php

namespace App\Providers;

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
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $this->loadConfig();
    }
    protected function loadConfig(){
        Aliyun::config([
            /*
            |--------------------------------------------------------------------------
            | 根据服务器所在区域进行选择
            | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo
            */
            'regionId'  => 'cn-hangzhou',
            /*
            |--------------------------------------------------------------------------
            | 如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
            | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            */
            'accessId'  => 'LTAIcVpnQItRx25i',
            /*
            |--------------------------------------------------------------------------
            | 如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
            | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            */
            'accessKey' => '8YITZPTPEcPXx4EYaSwnEhlP0O7N1j',
        ]);
    }
    /**
     * Register any application services.
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
