<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>
            <br>
            <div>
            <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="Last Name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- phone-->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>
            <!--photo path -->
            <div class="mt-4 hidden">
                <x-label for="photo_path" :value="__('Photo Path')" />

                <x-input id="photo_path" class="block mt-1 w-full" type="text" name="photo_path" :value="old('photo_path')" />
            </div>
            <div class="mt-4">
                <x-label for="accountid" :value="__('Account')" />
                <select placeholder ="select your organization" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name ="account_id">

                      @foreach($account as $acc)

                  <option name ="account_id" placeholder ="SELECT "value = "{{$acc->id}}">{{$acc->name}}</option>
                     @endforeach
</select>

            </div>
            <div class="mt-4">
                <x-label for="organizationid" :value="__('Organization')" />
                <select placeholder ="select your organization" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name ="organization_id">

                      @foreach($organization as $org)

                  <option name ="organization_id" placeholder ="SELECT "value = "{{$org->id}}">{{$org->name}}</option>
                     @endforeach
</select>

            </div>

            <div class="mt-4">
                <x-label for="roles" :value="__('Roles')" />
                <select placeholder ="select your organization" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name ="role">

                     

                  <option name ="admin" placeholder ="SELECT "value = 'admin'>Admin</option>
                  <option name ="user" placeholder ="SELECT "value = 'user'>User</option>
                  
                    
</select>

            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="mt-4">
                <x-label for="remember" value="" />
                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>


        </form>
    </x-auth-card>
</x-guest-layout>
