<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Cognito\Provider;
use SocialiteProviders\Manager\SocialiteWasCalled;

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
//    public function boot(): void
//    {
//        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
//            $event->extendSocialite('cognito', \SocialiteProviders\Cognito\Provider::class);
//        });
//    }
    public function boot(): void
    {
        Event::listen(SocialiteWasCalled::class, function ($event) {
            $event->extendSocialite('cognito', Provider::class);
        });
    }
//    public function boot(): void
//    {
//        // ESTA ES LA PARTE CRÍTICA
//        Event::listen(
//            SocialiteWasCalled::class,
//            [CognitoExtendSocialite::class, 'handle']
//        );
//    }
}
