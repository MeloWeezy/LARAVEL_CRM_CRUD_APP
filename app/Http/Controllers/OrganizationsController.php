<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *  'id' => $user->organization_id
     * $user->account_id
     *  'account_id' => $user->account_id,
     */
    public function index()

    {
        $user = auth()->user();

        if($user->hasRole('super_admin'))
        {
           $organizations= Organization::paginate(5);
        }
        else if($user->hasRole('admin'))
        {
           $organizations= Organization::where([
                'id' =>$user->organization_id,
               
         ])->paginate(5);

        }
        else
        {
           $organizations= Organization::where([
                   
                'id' =>$user->organization_id,
        ])->paginate();
        }
        
       
        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Organization $organization)
    {
        
        $this->authorize('create-organization', $organization);
        $account = auth()->user()->account;
        return view('organizations.create')->with('account',$account);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Organization $organization)
    {
        //
          //
          $this->authorize('store-organization',$organization);
          $validatedRequest = Validator::make($request->all(),[
            'name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'account_id'=> 'required'
        ])->validate();

       

       $organization = organization::create($validatedRequest);

        $account = auth()->user()->account;
     
        return redirect()->route('organizations.index',compact('account'))
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
      
      
        $this->authorize('read-organization', $organization);
        $account = auth()->user()->account;
       
        return view('organizations.show',compact('organization','account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organization  $organizations
     * @return \Illuminate\Http\Response
     */
    public function edit(organization $organization)
    {
       
        $this->authorize('update-organization', $organization);
        $account = auth()->user()->account;
    
        return view('organizations.edit',compact('account','organization'));
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
       
        $this->authorize('update-organization', $organization);
        $validatedRequest = Validator::make($request->all(),[
           'name'=> 'required',
           'email' => 'required',
           'city'=> 'required',
           'phone' => 'required',
           'country'=> 'required',
           'region'=> 'required',
           'address'=> 'required',
           'postal_code'=> 'required',
           'account_id'=> 'required'
       ])->validate();
      
    

       $organization->update($validatedRequest);

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
