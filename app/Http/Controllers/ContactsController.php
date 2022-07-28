<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->hasRole('super_admin'))
        {
            $contact = Contact::all();
            return view('contacts.index', compact('contact'));
        }
       
        
        $contact = Contact::where('accounts_id','=',auth()->user()->accounts_id)->get();
        $account =Account::paginate();

        return view('contacts.index', compact('contact','account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact)
    {
        $this->authorize('create-organizations', $contact);
        $account = Account::all();
        $organization = Organization::all();
        return view('contacts.create')->with('account',$account)->with('organization',$organization);
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
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'accounts_id'=> 'required',
            'organizations_id'=> 'required',




        ]);

        contact::create($request->all());
        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        if(auth()->user()->hasRole('admin') && (Auth::user()->accounts_id===$contact->accounts_id))
        {
            return view('contacts.show',compact('contact'));
        }
       
        $this->authorize('can-view-own-cont',$contact);
       // $user = User::all();
   
        return view('contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
        $this->authorize('update-contacts', $contact);

        $account = Account::all();
        $organization= organization::all();
        return view('contacts.edit',compact('contact'))->with('account',$account)->with('organization',$organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
        $this->authorize('update-contacts', $contact);
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'accounts_id'=> 'required',
            'organizations_id'=> 'required',





        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
                        ->with('success','account name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        $this->authorize('delete-contacts', $contact);
         $contact->delete();


        return redirect()->route('contacts.index')
        ->with('success','Product deleted successfully');
    }
}
