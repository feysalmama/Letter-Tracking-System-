<x-admin-layout>
    <div class="py-10 px-2 w-full">
        <h1 class=" pb-4 font-bold">CREATE NEW PERMISSION</h1>
        <div class=" rounded-sm bg-white ">
            <div class="flex justify-between items-center rounded-t-md text-white bg-gray-400  h-14 p-3 overflow-hidden">
                <h3>Add mew permission</h3>
                <a class=" flex bg-red-400 py-1 items-center gap-1 px-2 rounded-md text-black  "
                    href="{{ route('admin.permissions.index') }}">
                    <i class="fa-regular fa-eye text-white font-xl"></i>
                    See All permissions
                </a>
            </div>
            <form method="POST" action="{{ route('admin.permissions.store') }}">
                @csrf
                <div class=" p-6">
                    <input type="text" name="name" class=" outline outline-blue-300 outline-1 w-full rounded-md"
                        placeholder="Permission Type">

                    <button type="submit"
                        class=" bg-gray-500 my-4 px-6 py-2 rounded-md text-white flex items-center gap-1 ">
                        <i class="fa-regular fa-floppy-disk font-bold w-4"></i>
                        Save Permission
                    </button>
            </form>
        </div>
    </div>
</x-admin-layout>
