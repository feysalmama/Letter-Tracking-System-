<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-left">Role</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                              
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        </div>
                                        <span>Eshal Rosas</span>
                                    </div>
                                </td>
                             
                                <td class="py-3 px-6 text-left">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-sm text-xs">Admin</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span >oum.burs@gmail.com</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

 {{-- <!-- Modal toggle -->
 <div x-data="{ modelOpen: false }">
    <button @click="modelOpen = !modelOpen" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
        <!-- Button content here -->
        but
    </button>

    @include('admin.users.create', ['modelOpen' => 'modelOpen'])
</div> --}}
{{-- 
 <div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>

        <span>Invite Member</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Invite team memebr</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-sm text-gray-500 ">
                    Add your teammate to your team and start work to get things done
                </p>

                <form class="mt-5">
                    <div>
                        <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate name</label>
                        <input placeholder="Arthur Melo" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate email</label>
                        <input placeholder="arthurmelo@example.app" type="email" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>
                    
                    <div class="mt-4">
                        <h1 class="text-xs font-medium text-gray-400 uppercase">Permissions</h1>

                        <div class="mt-4 space-y-5">
                            <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: true }" @click="show =!show">
                                <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                    :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                    <label for="show"
                                        @click="show =!show"
                                        class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                        :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"></label>
                                    <input type="checkbox" name="show" class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"/>
                                </div>

                                <p class="text-gray-500">Can make task</p>
                            </div>

                            <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: false }" @click="show =!show">
                                <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                    :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                    <label for="show"
                                        @click="show =!show"
                                        class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                        :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"></label>
                                    <input type="checkbox" name="show" class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"/>
                                </div>

                                <p class="text-gray-500">Can delete task</p>
                            </div>

                            <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: true }" @click="show =!show">
                                <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                    :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                    <label for="show"
                                        @click="show =!show"
                                        class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                        :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"></label>
                                    <input type="checkbox" name="show" class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"/>
                                </div>

                                <p class="text-gray-500">Can edit task</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-6">
                        <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Invite Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


  
</x-app-layout>
