<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use Session;
use Validator;
use Illuminate\Validation\ValidationException;
use App\User;
use App\PasswordReset;
use Mail;
use App\Mail\Auth\Password\Forgot;

class ForgotController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getForgot()
    {
        if (!Auth::check()) {
            return View::make('pages.auth.password.forgot');
        }

        return Redirect::route('home');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postForgot(Request $request)
    {
        if (!Auth::check()) {
            Session::regenerate();

            try {
                Validator::make($request->all(), [
                    'email' => 'required|string|max:255|email|exists:users',
                ])->validate();
            } catch (ValidationException $exception) {
                return Redirect::route('auth.password.forgot')->withInput($request->all())->with([
                    'auth' => [
                        'password' => [
                            'forgot' => [
                                'alerts' => [
                                    'red' => $exception->errors(),
                                ],
                            ],
                        ],
                    ],
                ]);
            }

            $user = User::whereEmail($request->all()['email'])->get()[0];

            $token = $this->randomToken($user);

            PasswordReset::create([
                'user_id' => $user->id,
                'token' => $token,
            ]);

            Mail::send(new Forgot($user, $token));

            if (count(Mail::failures())) {
                return View::make('pages.massive-error')->with([
                    'alerts' => [
                        'red' => [
                            ['Failed to send email, try again later.',],
                        ],
                    ],
                ]);
            }

            return View::make('pages.massive-success')->with([
                'alerts' => [
                    'green' => [
                        ['Check your emails for information on resetting your password.',],
                    ],
                ],
            ]);
        }
    }

    /**
     * @param User $user
     * @return string
     */
    protected function randomToken(User $user)
    {
        $token = str_random(16);

        if (PasswordReset::whereUserAndToken($user, $token)->get()->count()) {
            return $this->randomToken($user);
        }

        return $token;
    }
}
