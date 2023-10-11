<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit department') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">


                <div class="flex flex-col  bg-slate-50">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 m-4 py-2">
                        @foreach ($departments as $department)
                         @if ($department->id == $clickedDepartmentId)
                            <form method="POST" action="{{ route('admin.departments.update', $department->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center flex-col p-2 bg-slate-50">
                                    <h1 class=" p-2 font-extrabold flex items-center">UPDATE DEPARTMENT</h1>
                                    <div class=" w-1/2 p-6">
                                        <input type="text" name="name"
                                            class=" outline outline-blue-300 outline-1 w-full rounded-md"
                                            placeholder="department Name" value="{{ $department->name }}">
                                    </div>
                                    <div class="w-1/2 p-6">

                                        <input type="text" name="description"
                                            class=" outline outline-blue-300 outline-1 w-full rounded-md"
                                            placeholder="description" value="{{ $department->description }}">
                                    </div>

                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit"
                                        class="flex items-center justify-center px-3 py-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Update</button>
                                </div>
                            </form>
                            @endif
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
</x-app-layout>
