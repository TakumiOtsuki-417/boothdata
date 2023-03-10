<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ secure_asset('/css/style.css')  }}" >
    </head>
    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container min-h-screen mx-auto">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
        
        <footer class="border-t border-gray-700 border-opacity-50 text-center mt-10">
            &copy;ブース管理アプリ
        </footer>
    </body>
</html>
