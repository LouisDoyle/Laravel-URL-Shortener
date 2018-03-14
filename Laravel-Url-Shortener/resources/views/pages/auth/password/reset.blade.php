@extends('layouts.app')

@section('title', 'Reset Password')

@section('body')
    <div class="section">
        <div class="grid">
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-branding">
                        <a href="{{ route('home') }}">Url<span>Shortener</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-text">
                        <h1 class="_center">Reset Password</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            @if(Session::has('auth.password.reset.alerts.red'))
                <div class="grid-row _margin-bottom-m">
                    <div class="grid-column-1-1 _align-center _justify-center">
                        <div class="element-alerts">
                            <ul>
                                @foreach(Session::get('auth.password.reset.alerts.red') as $item)
                                    <li>{{ $item[0] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-form">
                        <form action="{{ route('auth.password.reset', ['email' => $email, 'token' => $token]) }}" method="post" enctype="multipart/form-data">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" autofocus/>

                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" autofocus/>

                            {{ csrf_field() }}

                            <input type="submit" name="submit" id="submit" value="Submit" class="_indigo"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-text">
                        <div class="_center">Laravel Url Shortener</div>
                        <div class="_center">
                            <a href="https://github.com/LouisDoyle/Laravel-Url-Shortener" target="_blank">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
