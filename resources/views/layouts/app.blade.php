<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @include('layouts.includes.styles')
    </head>
    <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="app">
        <div id='loader'>
            <div class="spinner"></div>
        </div>

        <script>
            window.addEventListener('load', () => {
                const loader = document.getElementById('loader');
                setTimeout(() => {
                    loader.classList.add('fadeOut');
                }, 300);
            });
        </script>
        <!-- Site wrapper -->

        
        @includeIf('layouts.includes.fragments.left')
        <div class="page-container">
            @includeIf('layouts.includes.fragments.header')
            @includeIf('layouts.includes.fragments.content')
        </div>
        @includeIf('layouts.includes.fragments.footer')
        <!-- Scripts -->
        @include('layouts.includes.scripts')
    </body>
</html>
