<?php

namespace App\Providers;

use Braintree;
use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(Gateway::class, function ($app) {
        //     return new Gateway([
        //         'enviroment' => 'sandbox',
        //         'merchantId' => 'bhcnjb7v5ps4kyg2',
        //         'publicKey' => 'n78rfbjjfj9kfy4r',
        //         'privateKey' => 'b5608ecc38630b78349f565d1f8425f2',
        //     ]);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'bhcnjb7v5ps4kyg2',
                    'publicKey' => '7vgr4pdhzpm72r8x',
                    'privateKey' => 'f819a2ea9fc39c317ec41c26a383c443'
                ]
            );
        });
    }
}
