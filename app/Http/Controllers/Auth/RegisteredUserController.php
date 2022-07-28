<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $account = Account::all();
        return view('auth.register',compact('account'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'accounts_id'=> 'required',
            'phone'=> 'required',

        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'accounts_id'=> $request->accounts_id,
            'password' => Hash::make($request->password),
            'photo_path'=>$request->photo_path,
            'phone' => $request->phone,
            'role'=> $request->role
        ]);
         if($user->role ==='admin')
         {
            $user->assignRole('admin');
         }
         else if($user->role)
         {
            $user->assignRole('user');
         }
           
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
