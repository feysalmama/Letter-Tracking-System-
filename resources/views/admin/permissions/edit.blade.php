<x-admin-layout>

    <div class=" mt-10 px-2 mb-3">
        <div class=" rounded-sm bg-white">

            <div class="flex justify-between items-center rounded-t-md text-white bg-gray-400  h-14 p-3 overflow-hidden">
                <h3>Edit permission</h3>
                <div class="flex justify-end">
                    <a class="bg-orange-400 hover:bg-orange-300 px-2 py-1 my-3 mx-1 rounded-lg text-white "
                        href="{{ route('admin.roles.index') }}">Go to
                        roles</a>
                    <a class=" flex bg-red-400  items-center gap-1 px-2 py-1 my-3 mx-2 rounded-md hover:bg-red-700 text-black  "
                        href="{{ route('admin.permissions.index') }}">
                        <i class="fa-solid fa-backward text-white font-xl"></i>
                    </a>


                </div>


            </div>
            <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                @csrf
                @method('PUT')
                <div class=" p-6">
                    <input type="text" name="name" class=" outline outline-blue-300 outline-1 w-full rounded-md"
                        value="{{ $permission->name }}">

                    <button type="submit"
                        class=" bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1 ">
                        <i class="fa-regular fa-floppy-disk font-bold w-4"></i>
                        Save permission
                    </button>
            </form>
        </div>
    </div>
    <div class="bg-white mt-4 rounded-t-md">
        <h2 class="text-md  text-white bg-gray-400 rounded-t-md  h-14 p-3">Role Permissions</h2>
        <div class="flex space-x-2 mx-4 px-3 flex-wrap">
            @if ($permission->roles)
                @foreach ($permission->roles as $permission_role)
                    <div class="flex-shrink-0 mt-3">
                        <form class="px-2 w-full bg-red-400 hover:bg-red-600 text-white rounded-md" method="POST"
                            action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}
                                onsubmit="return
                            confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $permission_role->name }}</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="max-w-xl mt-6">
            <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                @csrf
                <div class=" m-4 sm:col-span-6">
                    <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select id="role" name="role" autocomplete="role-name"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('role')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
        </div>
        <div class=" mx-6 sm:col-span-6 pt-5">
            <button type="submit"
                class="bg-gray-500  px-6 py-2 rounded-md text-white flex items-center gap-1">Assign</button>
        </div>
        </form>
    </div>

</x-admin-layout>
