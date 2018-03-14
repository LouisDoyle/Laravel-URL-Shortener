Click the link bellow to begin the password reset.
<br/>
<a href="{{ route('auth.password.reset', ['email' => $user->email, 'token' => $token,]) }}">{{ route('auth.password.reset', ['email' => $user->email, 'token' => $token,]) }}</a>
<br/>
-------------------------------------------------
<br/>
Link valid for 24 hours.
