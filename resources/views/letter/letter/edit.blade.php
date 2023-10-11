<x-app-layout class="">

    <x-slot name="header">
        <h2 class="font-semibold text-sm  text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('Edit letter') }}
        </h2>
    </x-slot>

    <div class="py-2 w-full ">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">

                    <form method="POST" action="{{ route('letter.letter.update',$letter->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 mb-6 md:grid-cols-2 shadow-lg p-6">
                            <div>
                                <label for="customer_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Customer Name</label>
                                <input type="text" id="customer_name" name="customer_name" value="{{$letter->customer_name}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name" required>
                                @error('customer_name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                            </div>  
  
                            <div>
                                <label for="customer_phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Phone</label>
                                <input type="tel" id="customer_phone" name="customer_phone"  value="{{$letter->customer_phone}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="phone" required>
                                @error('customer_phone')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="Customer Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Email
                                </label>
                                <input type="email" id="customer_email" name="customer_email" value="{{$letter->customer_email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="email" required >
                                @error('customer_email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                            <div>
                                <label for="customer_address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Address
                                    </label>
                                <input type="text" id="customer_address" name="customer_address"  value="{{$letter->customer_address}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="address" >
                                @error('customer_address')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="file_path"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                                <input type="file" id="file_path" name="file_path" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     >
                                        @error('file_path')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="letter_type_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Letter Type</label>                                   
                                    <select name="letter_type_id" id="letter_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($letterTypes as $letterType)
                                            <option value="{{ $letterType->id }}" @if ($letter->letterType->id == $letterType->id) selected @endif >{{ $letterType->name }}</option>
                                        @endforeach
                                    </select>
                                @error('letter_type_id')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                     
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
