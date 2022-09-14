<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        if(auth()->user()->hasRole('super_admin'))
        {
           $users= User::paginate(5);
           return view('users.index', compact('users'));
        }

        if(auth()->user()->hasRole('admin'))
        {
           $users= User::where([
            'account_id' => auth()->user()->account_id,
            'organization_id' => auth()->user()->organization_id,
            ])->paginate(5);
            return view('users.index', compact('users'));
        }

        $users= User::where(['id' =>auth()->id()])->paginate(5);

        return view('users.index', compact('users'));
    }


    # ToDo: @Melusi Do the below methods work? Something if off about them
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(array $data)
    {
        //
        $account = Account::all();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=> $data['role']
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return View
     */
    public function store(Request $request): View
    {
        $validatedRequest = Validator::make($request->all(),
       [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'account_id'=> 'required',
            'organization_id'=> 'required'
        ])->validate();


         User::create($validatedRequest);

        return view('authen.dashboard')->with('success','You have signed-in');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function show(User $user): View
    {
        //
        $this->authorize('can-view-own',$user);

        $account = $user->account;
        $organization = $user->organization;

        return view('users.show',compact('user','account','organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user): View
    {
        $this->authorize('edit-user',$user);

        $account = $user->account;
        $organization = $user->organization;

        return view('users.edit',compact('account','user','organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authorize('edit-user',$user);
        $validatedRequest = Validator::make($request->all(),
        [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo_path'=>'required',
            'account_id'=> 'required',
            'organization_id'=>'required'
        ])->validate();

        $user->update($validatedRequest);

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete-user',$user);
        $user->delete();

        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
    }



    # ToDo: @Melusi What's going on here?

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'city'=> 'required',
            'photo_path'=>'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'account_id'=> 'required',
            'organization_id'=>'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return view('authen.dashboard')->with('success','You have signed-in');
    }

    public function registration()
    {
        $account = Account::all();
        return view('authen.register')->with('account',$account);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('authen.dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
