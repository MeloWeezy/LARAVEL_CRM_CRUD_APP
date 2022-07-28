<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Auth\Middleware\Authorize;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accounts = Account::where('id','=',auth()->user()->accounts_id)->get();

        return view('accounts.index', compact('accounts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Account $account)
    {
       
        
            $this->authorize('create-accounts', $account);
            return view('accounts.create');
        
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
            'name'=> 'required',
        ]);

        Account::create($request->all());
        return redirect()->route('accounts.index')
                        ->with('success','Account created successfully.');
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
    
        $this->authorize('read-accounts', $account);
        return view('accounts.show',compact('account'));


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

      $this->authorize('update-accounts', $account);
        
        return view('accounts.edit',compact('account'));
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
        
        $request->validate([
            'name' => 'required',

        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')
                        ->with('success','account name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $this->authorize('delete-accounts', $account);
       $account->delete();


        return redirect()->route('accounts.index')
                         ->with('success','Account deleted successfully');
    }
}
