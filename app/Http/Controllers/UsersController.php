<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Organization;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = auth()->user();

        if($current_user->hasRole('super_admin'))
        {
           $users= User::paginate(10);
        }
        else if($current_user->hasRole('admin'))
        {
           $users= User::where([
            'account_id' => $current_user->account_id,
            'organization_id' => $current_user->organization_id,
         ])->paginate(10);

        }
        else
        {
           $users= User::where([
                   
            'id' =>$current_user->id,
        ])->get();
        }
       
        
        # $users = auth->user()->hasRole('admin') ? User::where('users.account.id', auth()->user->account_id)->get() : auth()->user()

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Account $account)
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
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
       
       
      $this->authorize('edit-user',$user);
    
        $account = $user->account;
        $organization = $user->organization;
        //$id = Auth::User()->id;
        //$user=User::find($id);

       // $user = User::all();
        return view('users.edit',compact('account','user','organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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
                        ->with('success','account name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete-user',$user);
        $user->delete();

        return redirect()->route('users.index')
        ->with('success','Product deleted successfully');
    }

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
