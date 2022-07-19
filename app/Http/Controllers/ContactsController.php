<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Contact;
use App\Models\organization;
use Illuminate\Http\Request;

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
        $contact = Contact::paginate();

        return view('contacts.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = Account::all();
        $organization = organization::all();
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
         $contact->delete();


        return redirect()->route('contacts.index')
        ->with('success','Product deleted successfully');
    }
}
