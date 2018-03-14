<?php

namespace App\Http\Controllers;

use Auth;
use View;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function getHome()
    {
        if (Auth::check()) {
            //
        }

        return View::make('pages.home_guest');
    }
}
