<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PasswordReset;
use View;
use Carbon\Carbon;
use Redirect;
use Validator;
use Illuminate\Validation\ValidationException;
use Hash;

class ResetController extends Controller
{
    /**
     * @param string $email
     * @param string $token
     * @return $this|\Illuminate\Contracts\View\View
     */
    public function getReset(string $email, string $token)
    {
        $user = User::whereEmail($email)->get();

        if ($user->count()) {
            $passwordReset = PasswordReset::whereUserAndToken($user[0], $token)->get();

            if ($passwordReset->count()) {
                if ($passwordReset[0]->usable) {
                    if (Carbon::now()->timestamp - $passwordReset[0]->created_at->timestamp < 86400) {
                        return View::make('pages.auth.password.reset')->with([
                            'email' => $email,
                            'token' => $token,
                        ]);
                    } else {
                        return View::make('pages.massive-error')->with([
                            'alerts' => [
                                'red' => [
                                    ['The supplied token has expired.',],
                                ],
                            ],
                        ]);
                    }
                } else {
                    return View::make('pages.massive-error')->with([
                        'alerts' => [
                            'red' => [
                                ['The supplied token has already been used.',],
                            ],
                        ],
                    ]);
                }
            } else {
                return View::make('pages.massive-error')->with([
                    'alerts' => [
                        'red' => [
                            ['The supplied token doesn\'t belong to a registered password reset.',],
                        ],
                    ],
                ]);
            }
        } else {
            return View::make('pages.massive-error')->with([
                'alerts' => [
                    'red' => [
                        ['The supplied email doesn\'t belong to a registered user.',],
                    ],
                ],
            ]);
        }
    }

    /**
     * @param Request $request
     * @param string $email
     * @param string $token
     * @return $this|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function postReset(Request $request, string $email, string $token)
    {
        $user = User::whereEmail($email)->get();

        if ($user->count()) {
            $passwordReset = PasswordReset::whereUserAndToken($user[0], $token)->get();

            if ($passwordReset->count()) {
                if ($passwordReset[0]->usable) {
                    if (Carbon::now()->timestamp - $passwordReset[0]->created_at->timestamp < 86400) {
                        try {
                            Validator::make($request->all(), [
                                'password' => 'required|string|min:6|confirmed',
                            ])->validate();
                        } catch (ValidationException $exception) {
                            return Redirect::route('auth.password.reset', ['email' => $email, 'token' => $token,])->with([
                                'auth' => [
                                    'password' => [
                                        'reset' => [
                                            'alerts' => [
                                                'red' => $exception->errors(),
                                            ],
                                        ],
                                    ],
                                ],
                            ]);
                        }

                        $user[0]->password = Hash::make($request->all()['password']);
                        $user[0]->save();

                        $passwordReset[0]->usable = false;
                        $passwordReset[0]->save();

                        return View::make('pages.massive-success')->with([
                            'alerts' => [
                                'green' => [
                                    ['Your password has been reset, you can now login with that password.',],
                                ],
                            ],
                        ]);
                    }
                }
            }
        }

        return Redirect::route('auth.password.reset', ['email' => $email, 'token' => $token,]);
    }
}
