<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Roles') }}
        </h2>
    </x-slot>

    <div class="  py-10 px-2 w-full">
        <h1 class=" pb-4 font-bold">CREATE NEW ROLES</h1>
        <div class=" rounded-sm bg-white">
            <div class="flex justify-between items-center rounded-t-md text-white bg-gray-400  h-14 p-3 overflow-hidden">
                <h3>Add mew Role</h3>
                <a class=" flex bg-red-400 py-1 items-center gap-1 px-2 rounded-md text-black  "
                    href="{{ route('admin.roles.index') }}">
                    <i class="fa-regular fa-eye text-white font-xl"></i>
                    See All Roles
                </a>
            </div>
      
        <form method="POST" action="{{ route('admin.roles.store') }}">
            @csrf
            <div class="p-6">
                <input
                    type="text"
                    name="name"
                    id="roleName"
                    class="outline outline-blue-300 outline-1 w-full rounded-md"
                    placeholder="Role Name"
                >
        
                <div>
                    <h3 class="py-4 font-semibold">Assign Permissions</h3>
                    <div class="flex flex-wrap -mx-2">
                        @foreach ($permissions as $permission)
                            <div class="w-1/4 px-2 py-1 font-semibold">
                                <input
                                    class="rounded-md shadow-lg"
                                    type="checkbox"
                                    name="permissions[]"
                                    id="permission{{ $permission->id }}"
                                    value="{{ $permission->id }}"
                                >
                                <label for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1"
            >
                <i class="fa-regular fa-floppy-disk font-bold w-4"></i>
                Save Role
            </button>
        </form>
        
    </div>

    </div>


</x-app-layout>
