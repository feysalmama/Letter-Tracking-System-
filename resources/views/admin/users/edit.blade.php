<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full shadow-lg p-6  ">
        <div class="max-w-5xl  sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 py-12">
                <div class=" my-8 mx-20">
                    {{-- @foreach ($users as $user) --}}
                        {{-- @if ($user->id == $clickedUserId) --}}
                            {{-- <div class="flex items-center">
                                <div class="flex items-center space-x-4">
                                    <img class="w-10 h-10 rounded-full" src=""
                                        alt="Profile Image">
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                            </div> --}}
                            <div class="py-2 w-full ">
                                <div class=" mx-auto sm:px-6 lg:px-8">
                                    <div class="flex flex-col">
                                        <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="first_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">First
                                                            name</label>
                                                        <input type="text" id="first_name" name="first_name"
                                                            value="{{ $user->first_name }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="First name">
                                                        @error('first_name')
                                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Email
                                                            address</label>
                                                        <input type="email" id="email" name="email"
                                                            value="{{ $user->email }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            required>
                                                    </div>

                                                    <div>
                                                        <label for="middle_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Middle
                                                            Name</label>
                                                        <input type="text" id="middle_name" name="middle_name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="middle name" value="{{ $user->middle_name }}"
                                                            required>
                                                        @error('middle_name')
                                                            <span
                                                                class="text-red-400
                                                            text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="phone"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Phone
                                                            number</label>
                                                        <input type="tel" id="phone" name="phone"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="phone number" value="{{ $user->phone }}"
                                                            required>
                                                        @error('phone')
                                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="last_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Last
                                                            name</label>
                                                        <input type="text" id="last_name" name="last_name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="last name" value="{{ $user->last_name }}"
                                                            required>
                                                        @error('last_name')
                                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <label for="birth_date"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Date
                                                            of
                                                            Birth</label>
                                                        <input type="date" id="birth_date" name="birth_date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="" value="{{ $user->birth_date }}" required>
                                                        @error('birth_date')
                                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="department_id"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                                            Department
                                                        </label>

                                                        <select id="department_id" name="department_id"
                                                            autocomplete="department-name"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}">
                                                                    {{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-6">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                                            Picture</label>
                                                        <input type="file" id="image" name="image"   > 
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