<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create departments') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <form method="POST" action="{{ route('admin.departments.store') }}">
                    @csrf

                    <div class="flex items-center flex-col p-2 bg-slate-50">
                        <h1 class=" p-2 font-extrabold flex items-center">CREATE NEW DEPARTMENT</h1>
                        <div class=" w-1/2 p-6">
                            <input type="text" name="name"
                                class=" outline outline-blue-300 outline-1 w-full rounded-md"
                                placeholder="department Name">
                        </div>
                        <div class="w-1/2 ">
                            <textarea name="description" cols="30" rows="10"
                                class="outline text-gray-200 italic outline-blue-300 outline-1 w-full rounded-md"
                                placeholder="Insert one line description ..."></textarea>
                        </div>
                        <div class=" flex gap-2 m-2">
                            <button type="submit"
                                class=" bg-blue-500 px-2 py-2 rounded-md text-white flex items-center gap-1 hover:bg-blue-700 ">


                                Save departments
                            </button>
                            <a class=" bg-red-400 hover:bg-red-600  px-6 py-2 rounded-md text-white flex items-center "
                                href="{{ route('admin.departments.index') }}">
                                cancel
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
