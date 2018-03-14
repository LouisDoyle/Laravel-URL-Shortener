<?php

namespace App\Http\Controllers;

use App\Url;
use Redirect;
use View;

class RedirectController extends Controller
{
    /**
     * @param string $token
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function getRedirect(string $token)
    {
        $url = Url::whereToken($token)->get();

        if ($url->count()) {
            $url[0]->views++;

            $url[0]->save();

            return Redirect::away($url[0]->url);
        }

        return View::make('pages.massive-error')->with([
            'alerts' => [
                'red' => [
                    ['The supplied redirect token is invalid.',],
                ],
            ],
        ]);
    }
}
