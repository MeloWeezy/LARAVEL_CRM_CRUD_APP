<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use App\Models\Accounts;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organizations::paginate();
    
        return view('organizations.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = Accounts::all();
        return view('organizations.create')->with('account',$account);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          //
          $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'accounts_id'=> 'required',
           
            
           
            
        ]);

        Organizations::create($request->all());
        return redirect()->route('organizations.index')
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function show(organizations $organization)
    {
        //
        return view('organizations.show',compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function edit(organizations $organization)
    {
        //
        $account = Accounts::all();
       
        return view('organizations.edit',compact('organization'))->with('account',$account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organizations $organization)
    {
        //
         //
         $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'accounts_id'=> 'required',
           
            
           
            
        ]);

        $organization->update($request->all());
      
        return redirect()->route('organizations.index')
                        ->with('success','account name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy(organizations $organization)
    {
        //
        $organization->delete();
    

        return redirect()->route('organizations.index')
                         ->with('success','Organization deleted successfully');
    }
}
