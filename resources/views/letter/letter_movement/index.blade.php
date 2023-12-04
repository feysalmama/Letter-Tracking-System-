<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All List of Letter movements') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto ">

            <div class="flex justify-end items-center mt-6 p-2">
                <a href="#"
                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                    + Add Letter movements
                </a>
            </div>

            {{-- <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Unique Code of Letter</th>
                                        <th class="py-3 px-6 text-left">Current Node Location</th>
                                        <th class="py-3 px-6 text-left">Receive at</th>
                                        <th class="py-3 px-6 text-left">Status</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                    @foreach ($letterMovements as $letterMovement)
                                        <tr class="border-b border-gray-200 hover:bg-gray-400">

                                            <td class="py-3 px-6 text-left dark:text-white">
                                                <span>{{ $letterMovement->letter->unique_code }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-left dark:text-white">
                                                <span>{{ $letterMovement->node->name }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-left dark:text-white">
                                                <span>{{ $letterMovement->movement_date }}</span>
                                            </td>
                                            <td class="py-3 dark:text-white px-6 text-left">
                                                <span
                                                    class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $letterMovement->status }}</span>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">


                                                    <a href="{{ route('letter.letter-movements.show', $letterMovement->id) }}"
                                                        class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                        <div class="relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>

                                                        </div>
                                                    </a>

                                                    <a href="{{ route('letter.letter-movements.add', ['letter' => $letterMovement->letter->id]) }}"
                                                        class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110">
                                                        <div>

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
                                                        action="{{ route('letter.letter-movements.destroy', $letterMovement->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <div
                                                                class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
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

            </div> --}}
            @foreach ($letterMovements->groupBy('letter_id') as $letterId => $movements)
                <h2 class="text-lg font-medium mb-4">Letter title: {{ $movements->first()->letter->letter_title }}</h2>
                <div class="flex flex-col mb-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Unique Code of Letter</th>
                                            <th class="py-3 px-6 text-left">Current Node Location</th>
                                            <th class="py-3 px-6 text-left">Receive at</th>
                                            <th class="py-3 px-6 text-left">Status</th>
                                            <th class="py-3 px-6 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @foreach ($movements as $letterMovement)
                                            <tr class="border-b border-gray-200 hover:bg-gray-400">
                                                <td class="py-3 px-6 text-left dark:text-white">
                                                    <span>{{ $letterMovement->letter->unique_code }}</span>
                                                </td>
                                                <td class="py-3 px-6 text-left dark:text-white">
                                                    <span>{{ $letterMovement->node->name }}</span>
                                                </td>
                                                <td class="py-3 px-6 text-left dark:text-white">
                                                    <span>{{ $letterMovement->movement_date }}</span>
                                                </td>
                                                <td class="py-3 dark:text-white px-6 text-left">
                                                    <span
                                                        class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $letterMovement->status }}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">


                                                        <a href="{{ route('letter.letter-movements.show', $letterMovement->id) }}"
                                                            class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                            <div class="relative">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>

                                                            </div>
                                                        </a>

                                                        <a href="{{ route('letter.letter-movements.add', ['letter' => $letterMovement->letter->id]) }}"
                                                            class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110">
                                                            <div>

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
                                                            action="{{ route('letter.letter-movements.destroy', $letterMovement->id) }}"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">
                                                                <div
                                                                    class="w-4 mr-2 transform dark:text-white hover:text-purple-500 hover:scale-110 group">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
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
            @endforeach
        </div>
    </div>




</x-app-layout>
