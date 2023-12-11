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

    <div class="min-h-screen w-full mx-auto px-15 bg-white dark:bg-gray-900 ">


        <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 w-full z-50">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Letters</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SignIn</a>

                     
                    <button data-collapse-toggle="navbar-cta" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-cta" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 d:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>


        <div
            class="bg-white dark:bg-gray-900  flex flex-col lg:flex-row  items-center justify-items gap-8  min-h-screen  mx-auto mt-10 sm:my-20 px-20">
            <div class=" flex-row w-full md:w-1/2  space-y-5 items-center justify-items">
                <span class="text-sm text-light dark:text-slate-200">Letter Tracking System Enhancement</span>
                <div class="text-7xl text-bold  dark:text-slate-200 ">
                    Craft an Exceptional Letter Tracking Experience.

                </div>
                <div class=" dark:text-slate-200">

                    We convert leads into satisfied customers through impactful strategies.
                </div>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Learn
                    More</button>
            </div>

            <div class="w-full md:w-1/2 mt-4 md:mt-0">
                <img src="https://media.dashdevs.com/images/gen-z-mob.jpg" alt="image" srcset="" class="h-96">

            </div>


        </div>
        <div class="flex-col items-center justify-center mt-10 mb-20 ">
            <div class="text-center text-4xl font-bold dark:text-slate-200  mb-4 sm:mb-12">System Overview</div>
            <div
                class="bg-white dark:bg-gray-900  flex flex-col md:flex-row  items-center justify-items gap-8    mx-auto px-20">
                <div class=" flex-row w-full md:w-1/2  space-y-5 items-center justify-items">
                    <div
                        class="flex flex-col items-center justify-center  hover:bg-gray-100 dark:hover:bg-slate-800 dark:hover:text-slate-200 p-3 border border-gray-100 h-72 rounded-lg bg-trasparent ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-10 h-10 flex items-center justify-center">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        <a href="#" class=" text-xl font-bold pb-2  dark:text-slate-200">HOW IT WORKS</a>
                        <p class=" dark:text-slate-200">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia possimus eum mollitia sunt
                            commodi,
                            dignissimos delectus labore neque, eligendi fugiat dolor minus, nisi quis ducimus. Itaque
                            aspernatur
                            veniam molestiae quibusdam!</p>
                    </div>
                </div>

                <div class="w-full md:w-1/2 mt-4 md:mt-0">
                    <div
                        class="flex flex-col items-center justify-center  hover:bg-gray-100 dark:hover:bg-slate-800  p-3 border border-gray-100 h-72 rounded-lg bg-trasparent ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>

                        <a href="{{ route('home.check') }}" class=" text-xl font-bold  dark:text-slate-200 pb-2">CHECK STATUS</a>
                        <p class=" dark:text-slate-200">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia possimus eum mollitia sunt
                            commodi,
                            dignissimos delectus labore neque, eligendi fugiat dolor minus, nisi quis ducimus. Itaque
                            aspernatur
                            veniam molestiae quibusdam!</p>
                    </div>
                </div>
            </div>
        </div>



        <footer class="text-center mt-auto p-4 text-gray-700 dark:text-slate-200">
            <p>&copy; {{ now()->year }} Your Company Name. All rights reserved.</p>
        </footer>

    </div>




</body>

</html>
{{-- <section class=" bg-gray-100 w-full h-screen ">
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

        </div>

    </section> --}}
