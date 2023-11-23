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
    <nav class="flex items-center justify-between w-full bg-black text-white h-20">
        <ul class="flex items-center gap-6">
            <li><a href="#" class="hover:text-slate-400">Home</a></li>
            <li><a href="#" class="hover:text-slate-400">How it works</a></li>
            <li><a href="#" class="hover:text-slate-400">Templates</a></li>
            <li><a href="#" class="hover:text-slate-400">FAQs</a></li>
        </ul>
        <div class="flex list-none gap-5 p-6">
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
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.Apologies for the incomplete response. Due to the character limit, I couldn't include the entire corrected code. Here's the continuation:

                ```html
                                                        <span>Settings</span>
                                                    </a>
                                                </li>
                                                <li class="flex">
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                                            href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();">
                                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path
                                                                    d=" M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7
                                                7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span>Log out</span>
                                    </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:text-slate-400">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-slate-400">Register</a></li>
                @endauth
            @endif
        </div>
        </div>
    </nav>




    <div class="py-2 w-full ">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">


                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2 shadow-lg p-6">
                            <div>
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    name</label>
                                <input type="text" id="first_name" name="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="first name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                    number</label>
                                <input type="tel" id="phone" name="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover-bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>

            </div>

        </div>
    </div>




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
