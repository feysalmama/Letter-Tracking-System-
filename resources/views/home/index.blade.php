<!DOCTYPE html>
<html :class="{ 'dark': dark }" x-data="initAlpine()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body>
    <nav class="flex items-center justify-between w-full bg-black text-white h-20 ">
        <ul class="flex items-center p-40  w-full gap-6 ">
            <li><a href="#" class=" hover:text-slate-400">Home</a></li>
            <li><a href="#" class=" hover:text-slate-400">How it works</a></li>
            <li><a href="#" class=" hover:text-slate-400">Templates</a></li>
            <li><a href="#" class=" hover:text-slate-400">FAQs</a></li>
        </ul>
        <div class="flex list-none gap-5 p-6 ">
            @if (Route::has('login'))
                @auth
                    <li class="relative">
                        <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                            @click="toggleProfileMenu" aria-label="Account" aria-haspopup="true">
                            <img class="object-cover w-8 h-8 rounded-full"
                                src="{{ asset('user/' . Auth()->user()->image) }}" alt="" aria-hidden="true" />
                        </button>
                        <div x-show="isProfileMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @click.outside="closeProfileMenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">
                                <li class="flex">
                                    @if (Auth::user())
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('admin.users.edit', Auth()->user()->id) }}">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    @endif
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="#">
                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                </li>

                                <li class="flex">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>Log out</span>
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link click-scroll  hover:text-slate-400" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll  hover:text-slate-400"
                            href="{{ route('admin.users.create') }}">Register</a>
                    </li>
                @endauth
            @endif
        </div>
    </nav>

    <section class=" bg-teal-800 w-full h-screen ">
        <div class="flex items-center  pt-24">
            <p class=" text-teal-400 text-6xl pl-6">"Never Lose Sight of Your Mail:
                <br> Track Letters Efficiently and Seamlessly"
            </p>
        </div>

        <div class="flex justify-center items-center w-full pt-28 gap-8">
            <div
                class="flex flex-col items-center justify-center  hover:bg-teal-950 w-96 p-3 border border-teal-950 h-60 rounded-lg bg-trasparent ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-10 h-10 flex items-center justify-center">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                <a href="#" class=" text-xl font-bold pb-2">HOW IT WORKS</a>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia possimus eum mollitia sunt commodi,
                    dignissimos delectus labore neque, eligendi fugiat dolor minus, nisi quis ducimus. Itaque aspernatur
                    veniam molestiae quibusdam!</p>
            </div>
            <div
                class="flex flex-col items-center justify-center  hover:bg-teal-950 w-96 p-3 border border-teal-950 h-60 rounded-lg bg-trasparent ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>

                <a href="{{ route('home.check') }}" class=" text-xl font-bold pb-2">CHECK STATUS</a>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia possimus eum mollitia sunt commodi,
                    dignissimos delectus labore neque, eligendi fugiat dolor minus, nisi quis ducimus. Itaque aspernatur
                    veniam molestiae quibusdam!</p>
            </div>
            {{-- <div
                class="flex flex-col items-center justify-center  hover:bg-teal-950 w-96 p-3 border border-teal-950 h-60 rounded-lg bg-trasparent ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-10 h-10 flex items-center justify-center">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                <a href="#" class=" text-xl font-bold pb-2"></a>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia possimus eum mollitia sunt commodi,
                    dignissimos delectus labore neque, eligendi fugiat dolor minus, nisi quis ducimus. Itaque aspernatur
                    veniam molestiae quibusdam!</p>
            </div> --}}

        </div>

    </section>
    <section>
        <div class=" flex items-center justify-center gap-60 w-full h-40 bg-gray-950 ">
            <div>
                <h3 class="text-white text-lg ">Resources</h3>
                <ul class=" text-white ml-4 italic">
                    <li><a href="">Home</a></li>
                    <li><a href="">How it works</a></li>
                    <li><a href="">FAQs</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-lg ">Contact</h3>
                <ul class=" text-white ml-4 italic">
                    <li><a href="">teamfeysal@gmail.com</a></li>
                    <li><a href="">teamfeysal@gmail.com</a></li>
                    <li><a href="">teamfeysal@gmail.com</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-lg ">help and support</h3>
                <ul class=" text-white ml-4 italic">
                    <li><a href="">teamfeysal@gmail.com</a></li>
                    <li><a href="">teamfeysal@gmail.com</a></li>
                    <li><a href="">teamfeysal@gmail.com</a></li>
                </ul>
            </div>

        </div>
        <div class=" w-full h-6 bg-black flex items-center justify-center">
            <p class="text-white text-sm">&copy; 2023 TeamFeysal. All rights reserved </p>
        </div>
    </section>

</body>

</html>
