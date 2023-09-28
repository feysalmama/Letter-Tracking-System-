<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>
    <div class="py-10 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class=" p-2 font-extrabold">CREATE NEW ROLES</h1>

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
                                class="bg-blue-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1">
                                {{-- <i class="fa-regular fa-floppy-disk font-bold w-4"></i> --}}
                                Save Role
                            </button>

                            <a class=" bg-red-300 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1  "
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

</x-app-layout>
