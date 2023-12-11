<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        Letter Tracking System
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            <!-- Active items have the snippet below -->
            @if (request()->is('dashboard*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif

            <!-- Add this classes to an active anchor (a tag) -->
            <!-- text-gray-800 dark:text-gray-100 -->
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('dashboard') }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">Dashboard</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            <!-- Active items have the snippet below -->
            @if (request()->is('admin/departments*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif

            <!-- Add this classes to an active anchor (a tag) -->
            <!-- text-gray-800 dark:text-gray-100 -->
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('admin.departments.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                </svg>

                <span class="ml-4">Department</span>
            </a>
        </li>
    </ul>
    {{-- Letters --}}
    <ul>
        <li class="relative px-6 py-3">

            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="toggleLettersMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <!-- Active items have the snippet below -->
                    @if (request()->is('letter*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    @endif

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>

                    <span class="ml-4">Letters</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="isLettersMenuOpen">

                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('letter/letter*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('letter.letter.index') }}">Letters</a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('letter.letter.create') }}">
                            Add new letter
                        </a>
        </li> --}}
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('letter/letter-types*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('letter.letter-types.index') }}">
                            Letter types
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('letter/letter-movements*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('letter.letter-movements.index') }}">
                            Letter movements
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('letter/nodes*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('letter.nodes.index') }}">Nodes</a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('admin/permissions*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
            <a class="w-full" href="{{ route('letter.nodes.create') }}">Add new nodes</a>
        </li> --}}
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('letter/predefined-routes*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('letter.predefined-routes.index') }}">Predefined routes</a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('admin/permissions*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
            <a class="w-full" href="{{ route('letter.predefined-routes.create') }}">Add
                            predefined routes</a>
        </li> --}}
                    
                </ul>
            </div>
        </li>
    </ul>
    {{-- User and Roles --}}
    <ul>
        <li class="relative px-6 py-3">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                <!-- Active items have the snippet below -->

                    @if (request()->is('admin/users*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    @if (request()->is('admin/roles*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    @if (request()->is('admin/permissions*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>

                    <span class="ml-4">Users Management</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="isPagesMenuOpen">
                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('admin/users*') ? 'text-bold text-gray-800 dark:text-gray-400 text-xl' : ''}}">
                        <a class="w-full" href="{{ route('admin.users.index') }}">Users</a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="{{ route('admin.users.create') }}">Add new user</a>
                </li> --}}
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('admin/roles*') ? 'text-bold text-gray-800 dark:text-gray-400 text-xl' : ''}}">
                        <a class="w-full" href="{{ route('admin.roles.index') }}">Roles</a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="{{ route('admin.roles.create') }}">Add new role</a>
                </li> --}}
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('admin/permissions*') ? 'text-bold text-gray-800 dark:text-gray-400  text-xl' : ''}}">
                        <a class="w-full" href="{{ route('admin.permissions.index') }}">
                            Permissions
                        </a>
                    </li>
                    {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="{{ route('admin.permissions.create') }}">
                            Add new permission
                        </a>
                </li> --}}


                </ul>
            </div>
        </li>
    </ul>

    {{-- <ul>
        <li class="relative px-6 py-3" x-data="{ isOpen: false }">
            <!-- Active items have the snippet below -->
            <span x-show="isOpen" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"></span>
    
            <!-- Add this classes to an active anchor (a tag) -->
            <!-- text-gray-800 dark:text-gray-100 -->
            <button @click="isOpen = !isOpen" class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <span class="ml-4">Users Management</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="isOpen">
                <!-- Dropdown content -->
                <ul>
                    <!-- List items for the dropdown -->
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.users.index') }}">Users</a>
                    </li>
                    <!-- Add more list items as needed -->
                </ul>
            </div>
        </li>
    </ul> --}}
    





    {{-- <div class="px-6 my-6">
        <button
            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Create account
            <span class="ml-2" aria-hidden="true">+</span>
        </button>
    </div> --}}
</div>
