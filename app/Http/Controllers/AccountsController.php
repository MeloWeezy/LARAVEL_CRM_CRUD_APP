<?php

namespace App\Http\Controllers;
use App\Http\Resources\AccountResourceCollection;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        $user = auth()->user();
        $accounts = $user->hasRole('super_admin')
            ? Account::paginate(10)
            : Account::where([
                    'id' => $user->account_id,
                ])->get();

        return new AccountResourceCollection($accounts);

        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Account $account)
    {
      
            // $this->authorize('create-account', $account);
            // return view('accounts.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store-account');
        $validatedRequest = Validator::make($request->all(),
        [
            'name'=> 'required',
        ])->validate();

       $account =  Account::create($validatedRequest);
        return response()->json([
            'status' => true,
            'message' => "Account Created successfully!",
            'post' => new AccountResource($account)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //$id =  DB::table('accounts')->where($accounts->id);
        //$id = accounts::get
       // $accounts = DB::table('accounts')->find(1);
        //$accounts = Account::paginate(10);
    
        $this->authorize('read-account', $account);
      
        
        return new AccountResource($account);


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

      $this->authorize('update-account', $account);
        
      return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, Account $account)
    {
        
        $this->authorize('update-account', $account);
        $validatedRequest = Validator::make($request->all(),[
            'name' => 'required',

        ])->validate();

       $account =  Account::where([
            'id' => $account->id,
        ])->get();

        $account = $account->each->update($validatedRequest);

        return response()->json([
            'status' => true,
            'message' => "Account Updated successfully!",
            'Account' => new AccountResourceCollection($account)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $this->authorize('delete-account', $account);
       $account->delete();

        
      return response()->json([
        'status' => true,
        'message' => "Account Deleted successfully!",
    ], 200);
    }
}
