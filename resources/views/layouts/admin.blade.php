<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
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

<body class="font-sans text-sm antialiased text-black !bg-light dark:text-white">
    {{-- bg-[#F4F5FF] --}}


    <div class="h-screen">
        {{-- @include('layouts.navigation') --}}

        {{-- <div
            class="fixed space-y-4 z-20 h-screen px-4 bg-white  pt-20  border-r shadow-sm  border-slate-100 w-[270px]">



            <div class="text-sm text-slate-800">
                <a href="">
                    Dashboard
                </a>
            </div>
            <div class="text-sm text-slate-800">
                <a href="">
                    Tournament
                </a>
            </div>
            <div class="text-sm text-slate-800">
                <a href="">
                    New Tournament
                </a>
            </div>
            <div class="text-sm text-slate-800">
                <a href="">
                    Fixtures
                </a>
            </div>
            <div class="text-sm text-slate-800">
                <a href="">
                    Galery
                </a>
            </div>
            <div class="text-sm text-slate-800">
                <a href="">
                    Galery
                </a>
            </div>
        </div> --}}


        <nav x-data="{ open: false }"
            class="fixed top-0 z-30 w-full px-4 py-4 text-black bg-white border-b md:block min-h-14 border-slate-100">
            <div class="flex items-center justify-between max-w-6xl mx-auto">
                <span>JaraLoad</span>

                <div class="hidden md:flex relative space-x-1 text-[13px] text-slate-600">
                    <a class="px-2 py-2" href="/">Dashboard</a>
                    <a class="px-2 py-2" href="/transactions">Transactions</a>
                    <a class="px-2 py-2" href="/services">Services</a>
                    <a class="px-2 py-2" href="/users">Users</a>
                    <a class="px-2 py-2" href="/plans">Plans</a>
                </div>


                <button @click="open = !open" class="block text-base md:hidden">
                    <i x-show="!open" class="fa fa-bars"></i>
                    <i x-show="open" class="fa fa-times"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden">
                <div x-show="open" x-transition class="absolute left-0 w-full pl-4 bg-white top-14">
                    <a class="block px-2 py-2" href="/admin">Dashboard</a>
                    <a class="block px-2 py-2" href="">Tournament</a>
                    <a class="block px-2 py-2" href="">New Tournament</a>
                    <a class="block px-2 py-2" href="">Upload Result</a>
                    <a class="block px-2 py-2" href="">Gallery</a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="relative flex-1 px-4 pt-20">
            @if ($errors->any())
            <div class="max-w-5xl px-4 py-2 mx-auto bg-red-500 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-white ">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
            <div class="px-4 py-2 mx-auto text-white bg-green-500 rounded " role="alert">
                {{ session('success') }}
            </div>
            @endif
            @yield('content')
        </main>

    </div>
</body>

</html>