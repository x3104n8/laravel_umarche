<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- auth=認証ガードを示す。admin,  owners,  users それぞれの認証ガードで取得したユーザが存在するなら=ログインしているなら -->
        <!--
            if(auth('admin')->user())
                include('layouts.admin-navigation')
            elseif(auth('owners')->user())
                include('layouts.owner-navigation')
            elseif(auth('users')->user())
                include('layouts.user-navigation')
            endif
            -->
        @if(request()->is('admin*'))
            @include('layouts.admin-navigation')
        @elseif(request()->is('owner*'))
            @include('layouts.owner-navigation')
        @else
            @include('layouts.user-navigation')
        @endif

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
