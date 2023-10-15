<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full  ">
        <div class="max-w-5xl  sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 py-12">
                <div class=" my-8 mx-20">
                    {{-- profile image --}}
                    @foreach ($users as $user)
                        @if ($user->id == $clickedUserId)
                            <div class="flex items-center">
                                <div class="flex items-center space-x-4">
                                    <img class="w-10 h-10 rounded-full" src="{{ $user->profile_image_path }}"
                                        alt="Profile Image">
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                            </div>
                        @endif
                    @endforeach

                    <div class="mt-6 p-2 bg-slate-100 ">
                        <h2 class="text-2xl font-semibold">Permissions</h2>
                        {{-- Permission desplay  --}}
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md"
                                        method="POST"
                                        action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{ $user_permission->name }}</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>

                        {{-- Section for assign permission to user --}}
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
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
                        <div class="flex  sm:col-span-6 p-5">
                            <button type="submit"
                                class="px-4 py-1 bg-purple-500 hover:bg-purple-700 rounded-md">Assign</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
