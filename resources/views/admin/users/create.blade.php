<x-app-layout class="">

    <x-slot name="header">
        <h2 class="font-semibold text-sm  text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('Create user') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full ">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">

                    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2 shadow-lg p-6">
                            <div>
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    name</label>
                                <input type="text" id="first_name" name="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="first name" required>
                                @error('first_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                    number</label>
                                <input type="tel" id="phone" name="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="phone number" required>
                                @error('phone')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="middle_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle
                                    Name</label>
                                <input type="text" id="middle_name" name="middle_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="middle name" required>
                                @error('middle_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                    address</label>
                                <input type="email" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="email" required>
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                    name</label>
                                <input type="text" id="last_name" name="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="last name" required>
                                @error('last_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="•••••••••" required>
                            </div>
                            <div>
                                <label for="birth_date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                                    Birth</label>
                                <input type="date" id="birth_date" name="birth_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="" required>
                                @error('birth_date')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="•••••••••" required>
                            </div>
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                    Picture</label>
                                <input type="file" id="image" name="image" required>
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
