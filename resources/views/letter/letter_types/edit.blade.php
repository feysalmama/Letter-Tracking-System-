<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Letter types') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full shadow-lg p-6  ">
        <div class="max-w-5xl  sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 py-12">
                <div class=" my-8 mx-20">
                   
                            <div class="py-2 w-full ">
                                <div class=" mx-auto sm:px-6 lg:px-8">
                                    <div class="flex flex-col">
                                        <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                                            <form action="{{ route('admin.letter-types.update', $letterType->id) }}" method="POST"
                                               >
                                                @csrf
                                                @method('PUT')
                                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">
                                                            Name</label>
                                                        <input type="text" id="name" name="name"
                                                            value="{{ $letterType->name }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="First name">
                                                        @error('name')
                                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">description
                                                            address</label>
                                                        <input type="text" id="description" name="description"
                                                            value="{{ $letterType->description }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            required>
                                                    </div>


                                                    
                                                </div>


                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none w-40 focus:ring-blue-300 font-medium rounded-lg text-sm   px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                        </form>

                                    </div>

                                </div>

                            </div>
                </div>
                {{-- @endif
                @endforeach --}}


            </div>
        </div>
    </div>
    </div>
</x-app-layout>