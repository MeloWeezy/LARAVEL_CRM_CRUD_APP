<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;


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
        $user = Auth::user();
        
        if(($user->hasRole('user')))
        {
             $users = User::where('id',auth()->id())->get();

        }
         else if((Auth::user()->hasRole('admin')))
         {
            $users = User::where('id','>',1)->where('accounts_id','=',Auth::user()->accounts_id)->get();
         }
         else if(Auth::user()->hasRole('super_admin'))
         {
             $users = User::all();
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
            'password' => Hash::make($data['password'])
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'accounts_id'=> 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

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
       
        if(auth()->user()->hasRole('admin') && (Auth::user()->accounts_id===$user->accounts_id)&&($user->id!==1))
        {
            return view('users.show',compact('user','account'));
        }
        $this->authorize('can-view-own',$user);
       // $user = User::all();
        return view('users.show',compact('user','account'));
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
        $account = Account::all();
        //$id = Auth::User()->id;
        //$user=User::find($id);

       // $user = User::all();
        return view('users.edit')->with('user',$user)->with('account',$account);
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
        //
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo_path'=>'required',
            'accounts_id'=> 'required',
        ]);

        $user->update($request->all());

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
            'accounts_id'=> 'required',
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
