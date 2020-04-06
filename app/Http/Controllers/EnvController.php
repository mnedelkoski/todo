<?php

namespace App\Http\Controllers;

class EnvController extends Controller
{
    public function showEnvVariable()
    {
        $variable = env('MY_VARIABLE');

        $variableFromCache = config('new.default-email-from');

        return response()->json([$variableFromCache]);
    }
}
