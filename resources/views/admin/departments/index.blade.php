<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>



    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto ">

            <div class="flex justify-between items-center">
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <select
                                class="h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>5</option>
                                <option>10</option>
                                <option>20</option>
                            </select>

                        </div>
                        <div class="relative">
                            <select
                                class=" h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option>All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>

                        </div>
                    </div>
                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Search"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>

                </div>
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.departments.create') }}"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Create
                        departments</a>
                </div>





            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">departments</th>


                                        <th class="py-3 px-6 text-center">description</th>

                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>

                                @foreach ($departments as $department)
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr class="border-b border-gray-200 hover:bg-gray-400">

                                            <td class="py-3 px-6 text-left dark:text-white  capitalize">
                                                <div class="flex items-center">
                                                    <span>{{ $department->name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center dark:text-white ">
                                                <span>{{ $department->description }}</span>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">


                                                    <a href="{{ route('admin.departments.edit', $department->id) }}"
                                                        class="w-4  dark:text-white green mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="blue">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                    </a>



                                                    <form method="POST"
                                                        action="{{ route('admin.departments.destroy', $department->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <div
                                                                class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="red">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                <span
                                                                    class="absolute   left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                                                                    Delete
                                                                </span>
                                                            </div>
                                                        </button>
                                                    </form>

                                                </div>


                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>



                </div>

</x-app-layout>
