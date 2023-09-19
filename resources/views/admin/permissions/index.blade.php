<x-admin-layout>
    <div class=" p-6 ">
        <div class="flex justify-between p-2">
            <div class=" text-black font-extrabold text-xl "> USERS PERMISSION</div>
            <div class="flex justify-end">
                <a class=" text-sm  hover:bg-green-900 bg-green-700  text-white px-2 py-1 my-3 mx-1  rounded-md "
                    href="{{ route('admin.permissions.create') }}">Add
                    New Permission</a>
                <a class="bg-orange-300 hover:bg-orange-600 text-sm px-2 py-1 my-3 mx-1 rounded-lg text-white "
                    href="{{ route('admin.roles.index') }}">Go to
                    roles</a>

            </div>
        </div>
        <table class="min-w-full divide-y  divide-gray-200  rounded-lg  ">
            <thead class=" bg-gray-300  ">
                <tr class="">
                    <th scope="col"
                        class=" w-60  py-2 px-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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

                @foreach ($permissions as $permission)
                    <tr class=" ">
                        <td class=" py-2 whitespace-nowrap ">
                            <div
                                class="  flex items-center justify-center  px-2  py-1 bg-purple-200  text-blue-900 text-md">
                                {{ $permission->name }}
                            </div>

                        </td>

                        <td>
                            <div class="flex align-bottom justify-items-center px-6 real-time-date"
                                data-permission-id="{{ $permission->id }}">
                            </div>
                        </td>
                        <td>
                            <div class=" flex justify-end gap-2 px-6">
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"><i
                                        class="fa-regular fa-pen-to-square hover:text-green-800 text-green-600"></i></a>

                                <form method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"> <a class=" " href=""><i
                                                class="fa-solid fa-trash-can hover:text-red-800 text-red-600"></i></a></button>
                                </form>


                            </div>
                        </td>
                    </tr>
                @endforeach








        </table>
    </div>

</x-admin-layout>
