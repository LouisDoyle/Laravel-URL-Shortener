@extends('layouts.app')

@section('title', 'Login')

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
                        <h1 class="_center">Login</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            @if(Session::has('auth.login.alerts.red'))
                <div class="grid-row _margin-bottom-m">
                    <div class="grid-column-1-1 _align-center _justify-center">
                        <div class="element-alerts">
                            <ul>
                                @foreach(Session::get('auth.login.alerts.red') as $item)
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
                        <form action="{{ route('auth.login') }}" method="post" enctype="multipart/form-data">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" autofocus/>

                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password"/>

                            {{ csrf_field() }}

                            <input type="submit" name="submit" id="submit" value="Login" class="_indigo"/>
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
