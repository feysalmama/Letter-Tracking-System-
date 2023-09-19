
  <x-modal :show="$modelOpen" :close="'modelOpen = false'">
    <div class="py-12 w-full">
        <div class=" mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2"> --}}
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                        <form method="POST" action="{{ route('admin.users.store') }}" >
                            @csrf
                          <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
                            <div class="mt-1">
                              <input type="text" id="first_name" name="first_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('first_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700"> Middle Name </label>
                            <div class="mt-1">
                              <input type="text" id="middle_name" name="middle_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('middle_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
                            <div class="mt-1">
                              <input type="text" id="last_name" name="last_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('last_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                            <div class="mt-1">
                              <input type="email" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700"> Phone </label>
                            <div class="mt-1">
                              <input type="phone" id="phone" name="phone" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="birth_date" class="block text-sm font-medium text-gray-700"> Birth Date </label>
                            <div class="mt-1">
                              <input type="date" id="birth_date" name="birth_date" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('birth_date') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1">
                              <input type="password" id="password" name="password" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6 pt-5 flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-700 rounded-md">Create user</button>
                          </div>
                          
                        </form>
                      </div>
                      
                </div>
  
            {{-- </div> --}}
        </div>
    </div>
  </x-modal>

