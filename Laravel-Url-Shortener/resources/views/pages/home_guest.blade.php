@extends('layouts.app')

@section('title', 'Home')

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
                        <h1 class="_center">Home</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            <div class="grid-row _margin-bottom-m">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-buttons">
                        <ul>
                            <li>
                                <a href="{{ route('auth.register') }}" class="_indigo">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('auth.login') }}" class="_indigo">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-buttons">
                        <ul>
                            <li>
                                <a href="{{ route('auth.password.forgot') }}" class="_indigo _light">Forgot Your Password?</a>
                            </li>
                        </ul>
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
