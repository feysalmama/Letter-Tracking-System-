<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>



    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto ">

            <div class="flex justify-end items-center mt-6 p-2">
                    <a href="{{ route('admin.roles.create') }}"
                        class="flex items-center justify-center px-3 py-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Create
                        Role</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Role</th>

                                        <th class="py-3 px-6 text-left">Permissions</th>
                                        <th class="py-3 px-6 text-center">Created At</th>

                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                    @foreach ($roles as $role)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">

                                            <td class="py-3 px-6 text-left capitalize">
                                                <div class="flex items-center">
                                                    <span>{{ $role->name }}</span>
                                                </div>
                                            </td>


                                            <td class="py-3 px-6 text-left">
                                                @foreach ($role->permissions as $permission)
                                                    @if ($loop->iteration <= 3)
                                                        <span
                                                            class="bg-purple-200 text-purple-600 py-1 px-3 rounded-sm text-xs">{{ $permission['name'] }}</span>
                                                    @else
                                                        ...
                                                    @break
                                                @endif
                                            @endforeach

                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <span>{{ $role->created_at->format('Y-m-d H:i:s') }}</span>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">

                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">


                                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="blue">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                </a>



                                                <form method="POST"
                                                    action="{{ route('admin.roles.destroy', $role->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="red">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $roles->links() }} --}}
                </div>
            </div>
        </div>

    </div>
</div>

{{--  --}}
</x-app-layout>
