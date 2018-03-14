<?php

namespace App\Http\Controllers;

use Auth;
use View;

class HomeController extends Controller
{
    /**
     * @return $this|\Illuminate\Contracts\View\View
     */
    public function getHome()
    {
        if (Auth::check()) {
            return View::make('pages.home_auth')->with([
                'urls' => Auth::user()->urls()->orderBy('id', 'DESC')->get(),
            ]);
        }

        return View::make('pages.home_guest');
    }
}
