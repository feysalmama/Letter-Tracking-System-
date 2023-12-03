<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">


                <div class="flex flex-col  bg-slate-50">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 m-4 py-2">
                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block  text-gray-700 text-2xl font-semibold"> Role name
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ $role->name }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-1 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="flex items-center justify-center px-3 py-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-6 p-2 bg-slate-50">
                    <h2 class="text-2xl font-semibold">Role's Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                                <form
                                    class="flex items-center justify-center px-3 py-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-yellow-500 rounded-md dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:bg-yellow-700 hover:bg-yellow-600 focus:outline-none focus:bg-yellow-500 focus:ring focus:ring-yellow-300 focus:ring-opacity-50"
                                    method="POST"
                                    action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $role_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="flex items-center justify-center px-3 py-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Assign</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
