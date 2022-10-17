<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Resources\UserResourceCollection;
use App\Http\Resources\UserResource;
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
           return new UserResourceCollection($users);
        }

        if(auth()->user()->hasRole('admin'))
        {
           $users= User::where([
            'account_id' => auth()->user()->account_id,
            'organization_id' => auth()->user()->organization_id,
            ])->paginate(5);
            return new UserResourceCollection($users);
        }

        $users= User::where(['id' =>auth()->id()])->get();

       
    


        return new UserResource($users);
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
        'first_name'=> 'required',
        'last_name'=> 'required',
        'email' => 'required',
        'phone' => 'required',
        'password'=>'required',
        'photo_path'=>'required',
        'account_id'=> 'required',
        'organization_id'=>'required'
        ])->validate();


       $user = User::create($validatedRequest);

        return response()->json([
            'status' => true,
            'message' => "User Created successfully!",
            'User' => new UserResource($user)
        ], 200);;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function show(User $user)
    {
     
        //
        $this->authorize('can-view-own',$user);

   

    

        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('edit-user',$user);
       
        $account = $user->account;
        $organization = $user->organization;

        return new UserResource($user);
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

      return response()->json([
            'status' => true,
            'message' => "User Updated successfully!",
            'User' => new UserResource($user)
        ], 200);
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
              $user->delete();

             return response()->json([
                'status' => true,
                'message' => "User Deleted successfully!",
            ], 200);
       
    }

  



    # ToDo: @Melusi What's going on here?

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return response()->json([
                'status' => false,
                'message' => "Permission Already exists",
             
            ], 200);
        }

        $role->givePermissionTo($request->permission);
        return response()->json([
            'status' => true,
            'message' => "Permission added successfully!",
         
        ], 200);
    }

    public function revokePermission(Role $role, Request $request)
    {
        if($role->hasPermissionTo($request->permission))
        {
            $role->revokePermissionTo($permission);
            return response()->json([
                'status' => True,
                'message' => "Permission Revoked",
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => "Permission Does NoT exists",
         
        ], 200);
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return response()->json([
                'status' => false,
                'message' => "Role Already exists",
             
            ], 200);
        }

        $permission->assignRole($request->role);
        return response()->json([
            'status' => True,
            'message' => "Role Assigned",
         
        ], 200);
    }
    
    public function removeRole(Permission $permission,Request $request)
    {
        if ($permission->hasRole($request->role)) {
            $permission->removeRole($role);
            return response()->json([
                'status' => True,
                'message' => "Role Removed",
             
            ], 200);
        }

        return response()->json([
            'status' => False,
            'message' => "Role Doesn't Exist",
         
        ], 200);
    }
}
