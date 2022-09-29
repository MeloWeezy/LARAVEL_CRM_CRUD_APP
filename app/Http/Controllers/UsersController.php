<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResourceCollection;
use App\Models\Account;
use App\Models\User;
use App\Models\Deleted_user;
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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
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
    public function index()
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
    


        return new UserResourceCollection($users);
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
    public function destroy(User $user)
    {
        $this->authorize('delete-user',$user);
          
        Deleted_user::create([
            'token' => Str::random(10),
            'user_id'=> $user->id

        ]);

      Mail::to($user->email)->send(new MyMail($user));

       
    }

    public function removeUser($token): view
    {
          $deletedUser = Deleted_user::where('token',$token)->first();

                 if(isset($deletedUser))
                 {
                    $user = $deletedUser->user;
                    $user->delete();
                 }
                return view('auth.login')
                ->with('message','User deleted successfully successfully');
    }



    # ToDo: @Melusi What's going on here?

    

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
