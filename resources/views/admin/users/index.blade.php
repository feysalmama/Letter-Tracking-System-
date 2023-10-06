<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto ">

            <div class="flex justify-between items-center">
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <select
                                class=" h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>5</option>
                                <option>10</option>
                                <option>20</option>
                            </select>

                        </div>
                        <div class="relative">
                            <select
                                class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block  w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option>All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>

                        </div>
                    </div>
                    <form method="GET" action="{{ route('admin.users.index') }}" class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" name="query" placeholder="Search users"
                            value="{{ request()->input('query') }}"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        <button type="submit"
                            class="absolute inset-y-0 right-0 px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300">
                            Search
                        </button>
                    </form>


                </div>


                <div>
                    <a href="{{ route('admin.users.create') }}"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        + Add User
                    </a>

                </div>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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

                                    @foreach ($users as $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-400">

                                            <td class="py-3 px-6 text-left capitalize dark:text-white">
                                                <div class="flex items-center">
                                                    <div class="flex items-center space-x-4">
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="{{ asset('user/' . $user->image) }}"
                                                            alt="Profile Image">
                                                    </div>
                                                    <span>{{ $user->first_name . ' ' . $user->last_name }}</span>
                                                </div>
                                            </td>

                                            <td class="py-3 px-6 text-left ">

                                                @foreach ($user->roles as $role)
                                                    @if ($loop->iteration <= 3)
                                                        <span
                                                            class="bg-purple-200 text-purple-600 dark:text-white py-1 px-3 rounded-sm text-xs">{{ $role['name'] }}</span>
                                                    @else
                                                        ...
                                                    @break
                                                @endif
                                            @endforeach

                                        </td>
                                        <td class="py-3 px-6 text-center dark:text-white">
                                            <span>{{ $user->email }}</span>
                                        </td>
                                        <td class="py-3 dark:text-white px-6 text-center">
                                            <span
                                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">


                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                    <div class="relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" strokeWidth={2}
                                                            stroke="currentColor" className="w-8 h-8">
                                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                                        </svg>


                                                        <span
                                                            class="absolute left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                                                            Role
                                                        </span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('admin.users.permission', $user->id) }}"
                                                    class=" w-5 h-5 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                    <div class="relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                                        </svg>
                                                        <span
                                                            class="absolute  left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                                                            Permission
                                                        </span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                    <div class="relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>

                                                        <span
                                                            class="absolute left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                                                            Edit
                                                        </span>
                                                    </div>
                                                </a>



                                                <form method="POST"
                                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <div
                                                            class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            <span
                                                                class="absolute left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                                                                Delete
                                                            </span>
                                                        </div>
                                                    </button>
                                                </form>

                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


</x-app-layout>
