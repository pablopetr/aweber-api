<?php

namespace Pablopetr\AweberApi\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class AuthenticateController extends Controller
{
    public function __invoke(Request $request)
    {
        logger($request->all());
    }
}
