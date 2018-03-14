<?php

namespace App\Mail\Auth\Password;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Forgot extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Forgot constructor.
     * @param User $user
     * @param string $token
     */
    public function __construct(User $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.auth.password.forgot')
            ->to($this->user->email)
            ->from(env('MAIL_FROM'))
            ->subject('Forgot Your Password?')
            ->with([
                'user' => $this->user,
                'token' => $this->token,
            ]);
    }
}
