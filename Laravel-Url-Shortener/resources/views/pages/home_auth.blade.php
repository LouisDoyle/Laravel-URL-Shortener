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
            <div class="grid-row">
                <div class="grid-column-1-1 _align-center _justify-center">
                    <div class="element-form">
                        <form action="{{ route('auth.logout') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="element-buttons">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" onclick="event.preventDefault(); parentNode.parentNode.parentNode.parentNode.submit();" class="_indigo _light">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="grid">
            @if(Session::has('shorten.alerts.green'))
                <div class="grid-row _margin-bottom-m">
                    <div class="grid-column-1-1 _align-center _justify-center">
                        <div class="element-alerts">
                            <ul>
                                @foreach(Session::get('shorten.alerts.green') as $item)
                                    <li class="_green">{{ $item[0] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('shorten.alerts.red'))
                <div class="grid-row _margin-bottom-m">
                    <div class="grid-column-1-1 _align-center _justify-center">
                        <div class="element-alerts">
                            <ul>
                                @foreach(Session::get('shorten.alerts.red') as $item)
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
                        <form action="{{ route('shorten') }}" method="post" enctype="multipart/form-data">
                            <label for="url">Url to Shorten:</label>
                            <input type="text" name="url" id="url" value="{{ old('url') }}" autofocus/>

                            {{ csrf_field() }}

                            <input type="submit" name="submit" id="submit" value="Shorten" class="_indigo"/>
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
                        <h1 class="_center">Shortened Url(s):</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($urls))
        @foreach($urls as $item)
            <div class="section">
                <div class="grid">
                    <div class="grid-row">
                        <div class="grid-column-1-1 _align-center _justify-center">
                            <div class="element-text">
                                <h3>Long Url:</h3>
                                <p>{{ $item->url }}</p>
                                <h3>Short Url:</h3>
                                <p>
                                    <a href="{{ url($item->token) }}" target="_blank">{{ url($item->token) }}</a>
                                </p>
                                <h3>Views:</h3>
                                <p>{{ $item->views }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
