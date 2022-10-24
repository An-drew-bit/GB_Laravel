<?php

namespace App\Providers;

use App\Models\{Category, News, Resource, User};
use App\Policies\Admin\{CategoryPolicy, NewsPolicy, ResourcePolicy, UserPolicy};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        News::class => NewsPolicy::class,
        Category::class => CategoryPolicy::class,
        Resource::class => ResourcePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
