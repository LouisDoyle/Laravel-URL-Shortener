@extends('layouts.app')

@section('title', 'Massive Error!!!!!')

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
                        <h1 class="_center">Massive Error!!!!!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($alerts['red']))
        <div class="section">
            <div class="grid">
                <div class="grid-row">
                    <div class="grid-column-1-1 _align-center _justify-center">
                        <div class="element-alerts">
                            <ul>
                                @foreach($alerts['red'] as $item)
                                    <li>{{ $item[0] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
