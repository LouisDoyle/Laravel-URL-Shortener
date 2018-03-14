<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Session;

class LogoutController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        return Redirect::route('home');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogout()
    {
        if (Auth::check()) {
            Auth::logout();

            Session::invalidate();
        }

        return Redirect::route('home');
    }
}
