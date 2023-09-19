<x-admin-layout>
    <div class="p-10">
        <div class="flex justify-between p-2">
            <div class="text-black font-extrabold text-xl">USERS ROLE</div>
            <div class="flex">
                <a class="text-white text-sm hover:bg-green-900 bg-green-700 px-2 py-1 my-3 mx-1 rounded-md"
                    href="{{ route('admin.roles.create') }}">Add New Role</a>
                <a class="bg-orange-300 hover:bg-orange-600 text-sm px-2 py-1 my-3 mx-1 rounded-lg text-white "
                    href="{{ route('admin.permissions.index') }}">Go to
                    permissions</a>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-200 rounded-lg">
            <thead class="bg-gray-300">
                <tr>
                    <th scope="col"
                        class="py-2 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role</th>
                    <th scope="col"
                        class="w-60 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Permission</th>
                    <th scope="col"
                        class="py-2 px-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Posted Date
                    </th>
                    <th scope="col"
                        class="py-2 flex justify-end gap-2 px-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
                    <tr>
                        <td class="p-2 whitespace-nowrap">
                            <div
                                class="w-20 flex items-center justify-center px-2 py-1 bg-purple-200 rounded-md text-blue-900 text-md">
                                {{ $role->name }}
                            </div>
                        </td>
                        <td class="py-1 whitespace-nowrap">
                            <div class="flex gap-2 column-container max-w-md overflow-x-hidden">
                                @if ($role->permissions)
                                    @foreach ($role->permissions as $role_permission)
                                        <div class=" text-gray-500 rounded-md bg-gray-100 p-1 text-sm">
                                            {{ $role_permission->name }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="flex align-bottom justify-items-center px-6">
                                February 2, 2023
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2 px-6">
                                <a href="{{ route('admin.roles.edit', $role->id) }}"><i
                                        class="fa-regular fa-pen-to-square hover:text-green-800 text-green-600"></i></a>
                                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}"
                                    onSubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-800 text-red-600"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.column-container').on('click', function() {
                $(this).toggleClass('scrollable');
            });
        });
    </script>
    <style>
        .scrollable {
            overflow-x: auto;
            border-bottom: 2px solid blue;
        }
    </style>
</x-admin-layout>



{{-- <x-admin-layout>
    <div class=" p-10 ">
        <div class="flex justify-between p-2">
            <div class=" text-black font-extrabold text-xl"> USERS ROLE</div>
            <a class=" text-white font-bold hover:bg-gray-700  bg-green-900 p-2 rounded-md "
                href="{{ route('admin.roles.create') }}">Add
                New Role</a>
        </div>
        <table class="min-w-full divide-y  divide-gray-200  rounded-lg  ">
            <thead class=" bg-gray-300  ">
                <tr class="">
                    <th scope="col "
                        class="  px-3  py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID</th>
                    <th scope="col"
                        class="  py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role</th>
                    <th scope="col"
                        class=" w-60  py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Permission</th>
                    <th scope="col"
                        class="py-2 px-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Posted Date
                    </th>
                    <th scope="col"
                        class="py-2 flex justify-end gap-2 px-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    </th>

                </tr>



            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($roles as $role)
                    <tr class=" ">
                        <td class="px-3   py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $role->id }}
                            </div>
                        </td>


                        <td class=" py-2 whitespace-nowrap ">
                            <div
                                class=" w-20 flex items-center justify-center  px-2  py-1 bg-purple-200 rounded-md text-blue-900 text-md">
                                {{ $role->name }}
                            </div>

                        </td>



                        <td class="py-1 whitespace-nowrap">
                            <div class="flex gap-2" style="width: 400px; overflow-x: auto;">
                                @if ($role->permissions)
                                    @foreach ($role->permissions as $role_permission)
                                        <div class="rounded-sm text-gray-500 bg-gray-100 p-1 text-sm">
                                            {{ $role_permission->name }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>

                        <td>
                            <div class=" flex align-bottom justify-items-center px-6">
                                february 2,2023
                            </div>
                        </td>
                        <td>
                            <div class=" flex justify-end gap-2 px-6">
                                <a href="{{ route('admin.roles.edit', $role->id) }}"><i
                                        class="fa-regular fa-pen-to-square hover:text-green-800 text-green-600"></i></a>

                                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}"
                                    onSubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" hover:text-red-800 text-red-600"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout> --}}
