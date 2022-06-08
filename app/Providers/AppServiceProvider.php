<?php

namespace App\Providers;

use App\Serveces\Contract\{Parser, Social};
use App\Serveces\{ParserService, SocialService};
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
    public function register()
    {
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Parser::class, ParserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->uncompromised()
                ->numbers();
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });

        Model::preventLazyLoading(!app()->isProduction());
    }
}
