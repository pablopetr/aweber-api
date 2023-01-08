<?php

use Illuminate\Support\Facades\Route;
use Pablopetr\AweberApi\Controllers\AuthenticateController;

Route::get('/aweber/callback', AuthenticateController::class)->name('aweber.callback');
