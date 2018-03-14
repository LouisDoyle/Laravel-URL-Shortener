<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use Session;
use Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getLogin()
    {
        if (!Auth::check()) {
            return View::make('pages.auth.login');
        }

        return Redirect::route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        if (!Auth::check()) {
            Session::regenerate();

            try {
                Validator::make($request->all(), [
                    'email' => 'required|string|max:255|email',
                    'password' => 'required|string|min:6',
                ])->validate();
            } catch (ValidationException $exception) {
                return Redirect::route('auth.login')->withInput($request->all())->with([
                    'auth' => [
                        'login' => [
                            'alerts' => [
                                'red' => $exception->errors(),
                            ],
                        ],
                    ],
                ]);
            }

            if (!Auth::attempt([
                'email' => $request->all()['email'],
                'password' => $request->all()['password'],
            ], true)) {
                return Redirect::route('auth.login')->withInput($request->all())->with([
                    'auth' => [
                        'login' => [
                            'alerts' => [
                                'red' => [
                                    ['The given login credentials are incorrect.',],
                                ],
                            ],
                        ],
                    ],
                ]);
            }
        }

        return Redirect::route('home');
    }
}
