<?php

namespace App\Providers;

use App\Model\Article;
use App\Policies\ArticlePolicy;
use App\Policies\TopicPolicy;
use App\Policies\UserPolicy;
use App\Model\Topic;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User'=>UserPolicy::class,
        Article::class=>ArticlePolicy::class,
        Topic::class=>TopicPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
