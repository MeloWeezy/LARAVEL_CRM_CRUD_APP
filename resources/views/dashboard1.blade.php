<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-2xl text-red-800 leading-tight text-center bg-white">
            {{ __('CRMAPP DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="overflow-hidden flex mb-4 flex-wrap items-center justify-center shadow-sm sm:rounded-lg bg-white">
               
            <div class="p-6 bg-blue-500 w-1/3 border-b m-2  border-gray-200 text-center" >
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-500 text-white hover:bg-blue-600" href="{{ route('accounts.index') }}">ACCOUNTS</a>
                </div>

                <div
                class="p-6 bg-blue-500 w-1/3 m-2 border-b border-gray-200 text-center">
              
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-500 text-white hover:bg-blue-600" href="{{ route('contacts.index') }}">CONTACTS</a>
                </div>
                    @csrf
                  
                  
            </div >
              <!--come back put it un-->
            <div class="overflow-hidden flex mb-4 flex-wrap items-center justify-center shadow-sm sm:rounded-lg bg-white">
            <div class="p-6 bg-blue-500 w-1/3 m-2  border-b border-gray-200 text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-500 text-white hover:bg-blue-600" href="{{ route('organizations.index') }}">ORGANIZATIONS</a>

                </div>
                <div class="p-6 bg-blue-500 w-1/3 m-2 border-b border-gray-200 text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-500 text-white hover:bg-blue-600" href="{{ route('users.index') }}">USERS</a>

                </div>
           </div>  

        </div>
    </div>
</x-app-layout>
