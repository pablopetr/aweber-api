<?php

namespace Pablopetr\AweberApi;

use Illuminate\Support\ServiceProvider;
use Pablopetr\AweberApi\Commands\GenerateTokens;

class AweberApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            GenerateTokens::class,
        ]);

        $this->mergeConfigFrom(__DIR__ . '/config/aweber.php', 'aweber');
    }

    public function register()
    {

    }
}
