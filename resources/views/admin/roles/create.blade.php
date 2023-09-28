<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class=" p-2 font-extrabold ml-3">CREATE NEW ROLES</h1>
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="flex flex-col p-2 bg-slate-100">
                        <div class="p-6">
                            <input type="text" name="name" id="roleName"
                                class="outline outline-blue-300 outline-1 w-full rounded-md" placeholder="Role Name">

                            <div>
                                <h3 class="py-4 font-extrabold">ASSIGN PERMISSIONS</h3>
                                <div class="flex flex-wrap -mx-2 font-bold">
                                    @foreach ($permissions as $permission)
                                        <div class="w-1/4 px-2 py-1 ">
                                            <input class="rounded-md shadow-lg text-sm" type="checkbox"
                                                name="permissions[]" id="permission{{ $permission->id }}"
                                                value="{{ $permission->id }}">
                                            <label for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mr-10">
                            <button type="submit"
                                class=" hover:bg-blue-700 bg-blue-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5  ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>

                                Save Role
                            </button>

                            <a class=" hover:bg-red-500  bg-red-300 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1  "
                                href="{{ route('admin.roles.index') }}">
                                Cancel
                            </a>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
    </div>

</x-admin-layout>
