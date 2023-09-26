<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class=" p-2 font-extrabold">CREATE NEW ROLES</h1>


                {{-- <div class="  py-10 px-2 w-full"> --}}

                {{-- <div class=" rounded-sm bg-white"> --}}
                {{-- <div class="flex justify-between items-center rounded-t-md text-white bg-gray-400  h-14 p-3 overflow-hidden">
                <h3>Add mew Role</h3>

            </div> --}}
                {{-- <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="p-6">
                    <input type="text" name="name" class="outline outline-blue-300 outline-1 w-full rounded-md"
                        placeholder="Role Name">


                    <div class=" ">
                        <h3 class="py-4 font-semibold">Assign Permissions</h3>
                        <div class="grid grid-cols-4 gap-10">
                            @php
                                $columnCount = 0;
                            @endphp
                            @foreach ($permissions as $permission)
                                @if ($columnCount % 8 === 0)
                                    <div>
                                @endif
                                <div class="py-1 font-semibold">
                                    <input class="rounded-md shadow-lg" type="checkbox" name="permissions[]"
                                        value="{{ $permission->id }}">
                                    <label>{{ $permission->name }}</label>
                                </div>
                                @if ($columnCount % 8 === 7 || $loop->last)
                        </div>
                        @endif
                        @php
                            $columnCount++;
                        @endphp
                        @endforeach
                    </div>
                </div>
        </div>
        <button type="submit" class="bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1">
            <i class="fa-regular fa-floppy-disk font-bold w-4"></i>
            Save Role
        </button>
        </form> --}}

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

</x-admin-layout>
