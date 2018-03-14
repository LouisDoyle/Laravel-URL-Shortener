<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Session;
use Validator;
use Illuminate\Validation\ValidationException;
use App\Url;

class ShortenController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getShorten()
    {
        return Redirect::route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postShorten(Request $request)
    {
        if (Auth::check()) {
            Session::regenerate();

            try {
                Validator::make($request->all(), [
                    'url' => 'required|string|url',
                ])->validate();
            } catch (ValidationException $exception) {
                return Redirect::route('home')->withInput($request->all())->with([
                    'shorten' => [
                        'alerts' => [
                            'red' => $exception->errors(),
                        ],
                    ],
                ]);
            }

            $token = $this->randomToken();

            Url::create([
                'user_id' => Auth::user()->id,
                'url' => $request->all()['url'],
                'token' => $token,
            ]);

            return Redirect::route('home')->withInput($request->all())->with([
                'shorten' => [
                    'alerts' => [
                        'green' => [
                            ['Url has been shortened, check bellow.',],
                        ],
                    ],
                ],
            ]);
        }

        return Redirect::route('home');
    }

    /**
     * @return string
     */
    protected function randomToken()
    {
        $token = str_random(6);

        if (Url::whereToken($token)->get()->count()) {
            return $this->randomToken();
        }

        return $token;
    }
}
