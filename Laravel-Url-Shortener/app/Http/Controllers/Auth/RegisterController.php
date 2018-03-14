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
use App\User;
use Hash;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getRegister()
    {
        if (!Auth::check()) {
            return View::make('pages.auth.register');
        }

        return Redirect::route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(Request $request)
    {
        if (!Auth::check()) {
            Session::regenerate();

            try {
                Validator::make($request->all(), [
                    'email' => 'required|string|max:255|email|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                ])->validate();
            } catch (ValidationException $exception) {
                return Redirect::route('auth.register')->withInput($request->all())->with([
                    'auth' => [
                        'register' => [
                            'alerts' => [
                                'red' => $exception->errors(),
                            ],
                        ],
                    ],
                ]);
            }

            User::create([
                'email' => $request->all()['email'],
                'password' => Hash::make($request->all()['password']),
            ]);

            Auth::attempt([
                'email' => $request->all()['email'],
                'password' => $request->all()['password'],
            ], true);
        }

        return Redirect::route('home');
    }
}
