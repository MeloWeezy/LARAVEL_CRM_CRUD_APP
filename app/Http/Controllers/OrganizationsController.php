<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use App\Models\Account;
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
       
        $organization = organization::where('accounts_id','=',auth()->user()->accounts_id)->get();
        return view('organizations.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Organization $organization)
    {
        
        $this->authorize('create-organizations', $organization);
        $account = Account::all();
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

        organization::create($request->all());
        return redirect()->route('organizations.index')
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organization  $organizations
     * @return \Illuminate\Http\Response
     */
    public function show(organization $organization)
    {
        //
        if(auth()->user()->hasRole('admin') && (Auth::user()->accounts_id===$organization->accounts_id))
        {
            return view('organizations.show',compact('organization'));
        }
        $this->authorize('can-view-own-org',$organization);
       
        return view('organizations.show',compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organization  $organizations
     * @return \Illuminate\Http\Response
     */
    public function edit(organization $organization)
    {
        
        $this->authorize('update-organizations', $organization);
        $account = Account::all();

        return view('organizations.edit',compact('organization'))->with('account',$account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\organization  $organizations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organization $organization)
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
     * @param  \App\Models\organization  $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy(organization $organization)
    {
        //
        $this->authorize('delete-organizations', $organization);
        $organization->delete();


        return redirect()->route('organizations.index')
                         ->with('success','Organization deleted successfully');
    }
}
