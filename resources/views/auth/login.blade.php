@extends('layouts.guest')

@section('content')
<!-- Session Status -->

<x-auth-session-status class="mb-4" :status="session('status')" />


<div class='t'>
    <div class="bg-white border border-gray-200 mt-7 rounded-xl shadow-2xs ">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 ">Sign in</h1>

            </div>

            <div class="mt-5">

                <div
                    class="flex items-center py-3 text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 ">
                    Admin</div>

                {{-- {/* Form */} --}}
                <form method='POST' action='{{ route('login') }}'>
                    @csrf
                    <div class="grid gap-y-4">

                        <div>
                            <label htmlFor="email" class="block mb-2 text-sm ">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="py-2.5 sm:py-3 px-4 block w-full bg-slate-50 border-slate-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus-visible:outline-none focus:outline-none"
                                    required aria-describedby="email-error" />
                                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="hidden mt-2 text-xs text-red-600" id="email-error">Please include a valid
                                email address so we can get back to you</p>
                        </div>

                        <div>
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <label htmlFor="password" class="block mb-2 text-sm ">Password</label>
                                {{-- <a
                                    class="inline-flex items-center text-sm font-medium text-blue-600 gap-x-1 decoration-2 hover:underline focus:outline-hidden focus:underline dark:text-blue-500 "
                                    href="../examples/html/recover-account.html">Forgot password?</a> --}}
                            </div>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-slate-50 focus-visible:outline-none focus:outline-none"
                                    required aria-describedby="password-error" />
                                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="hidden mt-2 text-xs text-red-600" id="password-error">8+ characters required
                            </p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500  dark:checked:bg-blue-500 dark:checked:border-blue-500 " />
                            </div>
                            <div class="ms-3">
                                <label htmlFor="remember-me" class="text-sm ">Remember me</label>
                            </div>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                            in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection