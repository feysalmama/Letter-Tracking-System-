<x-admin-layout>
    <div class="  py-10 px-2">
        <div class=" rounded-sm bg-white mb-2">
            <div class="flex justify-between items-center rounded-t-md text-white bg-gray-400  h-14 p-3 overflow-hidden">
                <h3>Edit Role</h3>
                <div class="flex justify-end gap-1">
                    <a class="bg-orange-300 hover:bg-orange-600 text-sm px-2 py-1 my-3 mx-1 rounded-lg text-white "
                        href="{{ route('admin.permissions.index') }}">Go to
                        permissions</a>
                    <a class=" flex bg-red-400 hover:bg-red-600 py-1 items-center   px-2 my-3 mx-1 rounded-md text-black  "
                        href="{{ route('admin.roles.index') }}">

                        <i class="fa-solid fa-backward text-white font-xl"></i>
                    </a>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class=" p-6">
                    <input type="text" name="name" class=" outline outline-blue-300 outline-1 w-full rounded-md"
                        value="{{ $role->name }}">

                    <button type="submit"
                        class=" bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1 ">
                        <i class="fa-solid fa-pen-to-square font-bold w-4"></i>
                        Update Role
                    </button>
                </div>
            </form>
        </div>


    </div>
    <div class="bg-white mx-2 rounded-md">
        <h2 class="text-md  text-white bg-gray-400 rounded-t-md  h-14 p-3">Role Permissions</h2>
        <div class="flex space-x-2 mt-4 px-6 flex-wrap">
            @if ($role->permissions)
                @foreach ($role->permissions as $role_permission)
                    <div class="flex-shrink-0 mt-3">
                        <form class="px-2 w-full bg-red-400 hover:bg-red-600 text-white rounded-md" method="POST"
                            action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm " type="submit">{{ $role_permission->name }}</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="max-w-xl mt-6 px-6">
            <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
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
        <div class="sm:col-span-6 pt-5 px-6"">
            <button type="submit" class=" bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1"><i
                    class="fa-brands
                fa-atlassian"></i>Assign</button>
        </div>
        </form>
    </div>
    </div>
</x-admin-layout>
