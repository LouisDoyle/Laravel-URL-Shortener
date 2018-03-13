<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    /**
     * @param string $email
     * @param string $token
     */
    public function getReset(string $email, string $token)
    {
        //
    }

    /**
     * @param Request $request
     * @param string $email
     * @param string $token
     */
    public function postReset(Request $request, string $email, string $token)
    {
        //
    }
}
