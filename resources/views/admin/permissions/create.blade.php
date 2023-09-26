<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class=" p-2 font-extrabold">CREATE NEW ROLES</h1>
                <form method="POST" action="{{ route('admin.permissions.store') }}">
                    @csrf
                    <div class="flex flex-col p-2 bg-slate-100">
                        <div class=" p-6">
                            <input type="text" name="name"
                                class=" outline outline-blue-300 outline-1 w-full rounded-md"
                                placeholder="Permission Type">
                        </div>
                        <div class=" flex gap-2 m-2">
                            <button type="submit"
                                class=" bg-blue-500 px-2 py-2 rounded-md text-white flex items-center gap-1 ">
                                {{-- <i class="fa-regular fa-floppy-disk font-bold w-4"></i> --}}
                                Save Permission
                            </button>
                            <a class=" bg-red-400  px-6 py-2 rounded-md text-white flex items-center "
                                href="{{ route('admin.permissions.index') }}">
                                cancel
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
