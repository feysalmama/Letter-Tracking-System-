<x-app-layout class="">

    <x-slot name="header">
        <h2 class="font-semibold text-sm  text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('Create Route') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full ">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">

                    <form method="POST" action="{{ route('letter.predefined-routes.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2 shadow-lg p-6">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Name" required>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                            </div>


                            <div>
                                <label for="estimated_waiting_time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estimated_waiting_time
                                    number</label>
                                <input type="number" id="estimated_waiting_time" name="estimated_waiting_time"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="estimated_waiting_time number" required>
                                @error('estimated_waiting_time')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="Office Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Office
                                    Name</label>
                                <input type="text" id="office_name" name="office_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="office name" required>
                                @error('office_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="letter_type_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Letter
                                    Type</label>
                                <select name="letter_type_id" id="letter_type_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($letterTypes as $letterType)
                                        <option value="{{ $letterType->id }}"
                                            @if ($loop->first) selected @endif>{{ $letterType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('letter_type_id')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="zone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zone
                                </label>
                                <input type="text" id="zone" name="zone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="zone">
                                @error('zone')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="woreda"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">woreda</label>
                                <input type="text" id="woreda" name="woreda"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="woreda">
                                @error('woreda')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="in_or_out_office"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In or out
                                    Office
                                </label>
                                <input type="checkbox" id="in_or_out_office" name="in_or_out_office" value="1"
                                    class="rounded-lg" {{ old('in_or_out_office', 0) == 1 ? 'checked' : '' }}>
                            </div>



                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
