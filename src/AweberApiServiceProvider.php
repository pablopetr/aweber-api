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

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {

    }
}
