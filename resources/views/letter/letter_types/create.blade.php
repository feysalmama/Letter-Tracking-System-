<x-app-layout class="">

    <x-slot name="header">
        <h2 class="font-semibold text-sm  text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('Create Letter Types') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full ">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">

                    <form method="POST" action="{{ route('letter.letter-types.store') }}" >
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2 shadow-lg p-6">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder=" Name" required>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            <div>
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                                    number</label>
                                <input type="tel" id="description" name="description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="description" required>
                                @error('description')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                          
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
