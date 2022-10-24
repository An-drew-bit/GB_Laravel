<?php

namespace App\Providers;

use App\Queries\Auth\AuthBuilder;
use App\Queries\{CategoryBuilder, NewsBuilder, UserBuilder};
use App\Queries\Contracts\QueryBuilder;
use App\Serveces\Contract\{Parser, Social, Upload};
use App\Serveces\{ParserService, SocialService, UploadService};
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Queries
        $this->app->bind(QueryBuilder::class, AuthBuilder::class);
        $this->app->bind(QueryBuilder::class, CategoryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsBuilder::class);
        $this->app->bind(QueryBuilder::class, UserBuilder::class);

        // Services
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Upload::class, UploadService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Password::defaults(function() {
            return Password::min(8)
                ->letters()
                ->uncompromised()
                ->numbers();
        });

        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });

        Model::preventLazyLoading(!app()->isProduction());
    }
}
