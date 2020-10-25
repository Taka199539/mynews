<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <title>@yield('title')</title>
        
        
        <!-- Scripts JavaScriptを読み込む-->
        <script src="{{ secure_asset('js/app.js') }}"defer></script>
        
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href0="https://fonts.googleapis.com/css?family=Raleway:300,400,600"
        rel="stylesheet" type="text_css">
        
        
        <!-- Styles cssを読み込む-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}"> 
                    {{ config('app.mame','laravel')}} 
                              </a>
                    <button class="navbar-toggler" type="button" 
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                        </ul>
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                
                @yield('content') 
            </main>
        </div>
    </body>
</html>
