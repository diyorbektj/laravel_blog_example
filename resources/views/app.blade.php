<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('metakey')">
    <meta 
    name="description" 
    content='@yield('metadesc')'>

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script defer src="/js/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
<body class="bg-gray-200">
  @include('components.header')
  <div class="max-w-screen-lg mx-auto">
        @yield('content')
        <div style="margin: 50px;"></div>
        @include('components.footer')
</div>
</body>
<style>
    .testcha{
        position: absolute;
        top: 19px;
        left: 500px;
    }

    .marigin-right{
            margin-right: 0px
        }
    .js{
        
        position: absolute;
        top: 65px;
        right: 0;
    }
    .pad{
        z-index: 1;
        position: sticky;
        top: 0;
        padding-left: 2px;
        padding-right: 2px;
    }
    @media (max-width: 640px){
        .js{
            --tw-bg-opacity: 1;
        background-color: rgb(21 128 61 / var(--tw-bg-opacity));
        width: 100%;
        height: auto;
        padding: 1rem;
        }
        .marigin-right{
            margin-right: 35px
        }
        .testcha{
            position: absolute;
            left: -9999px;
        }
        .pad{
            padding-left: 10px;
            padding-right: 10px;
        }
        @media (min-width: 1020px){
            .testch{
                position: absolute;
                left: 0; 
            }
        }
    }
    .text-test{
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    }
          .bg100{
                    position: absolute;
                    top: 0;
                    background: linear-gradient(0deg,rgb(0, 0, 0),rgb(255, 255, 255));
                    width: 100%;
                    height: 100%;
                    opacity: 0.5;
                }
</style>
</html>