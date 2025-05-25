<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <title>{{ config('app.name', 'JaraaLoad') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class="flex flex-col items-center justify-center min-h-screen px-2 pt-6 bg-gray-100 sm:pt-0 ">

        @if ($errors->any())
        <div class="max-w-5xl px-4 py-2 mx-auto bg-red-500 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-white ">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md sm:rounded-lg">
            {{-- class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg"> --}}
            @yield('content')
        </div>
    </div>
</body>

</html>