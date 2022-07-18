<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $accounts = Accounts::paginate();
    
        return view('accounts.index', compact('accounts'));
            
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        accounts::create($request->all());
        return redirect()->route('accounts.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Accounts $account)
    {
        //$id =  DB::table('accounts')->where($accounts->id);
        //$id = accounts::get
       // $accounts = DB::table('accounts')->find(1);
        //$accounts = Accounts::paginate(10);
        return view('accounts.show',compact('account'));

        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounts $account)
    {

        return view('accounts.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */

   
     
    public function update(Request $request, Accounts $account)
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
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounts $account)
    {
       $account->delete();
    

        return redirect()->route('accounts.index')
                         ->with('success','Account deleted successfully');
    }
}
