<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
<<<<<<< HEAD
        //
        if(auth()->user()->hasRole('super_admin'))
        {
            $contact = Contact::all();
            return view('contacts.index', compact('contact'));
        }
       
        
        $contact = Contact::where('accounts_id','=',auth()->user()->accounts_id)->where('organizations_id','=',auth()->user()->organizations_id)->get();
        $account =Account::paginate();
=======

        # Model:all(), is not recommended as it may affect performance
        # Double Where Clause can be simplified to 1 where clause with Array

        $user = auth()->user();
        $contact = $user->hasRole('super_admin')
            ? Contact::paginate(10)
            : Contact::where([
                    'account_id' => $user->account_id,
                    'organization_id' => $user->organization_id
                ])->paginate(10);
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1

        return view('contacts.index', compact('contact','account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
<<<<<<< HEAD
    public function create(Contact $contact)
    {
        $this->authorize('create-organizations', $contact);
        $account = Account::all();
        $organization = Organization::all();
        return view('contacts.create')->with('account',$account)->with('organization',$organization);
=======

    public function create(Contact $contact): View
    {
        # ToDo: Fix Gate Name
        # Getting Account and Organization using relationships is more efficient than all()

        $this->authorize('create-organizations', $contact);

        $account = auth()->user()->account;
        $organization = auth()->user()->organization;

        return view('contacts.create', compact('account', 'organization'));

>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        # ToDo: Gate for Store Contact

        $validatedRequest = Validator::make($request->all(), [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'account_id'=> 'required',
            'organization_id'=> 'required',
        ])->validate();

        # Avoid request->all() directly to Model::create() as it's a security risk.
        Contact::create($validatedRequest);

        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return View
     */
    public function show(contact $contact): View
    {
<<<<<<< HEAD
        if(auth()->user()->hasRole('admin') && (Auth::user()->accounts_id===$contact->accounts_id)&&(Auth::user()->organizations_id===$contact->organizations_id))
        {
            return view('contacts.show',compact('contact'));
        }
       
        $this->authorize('can-view-own-cont',$contact);
       // $user = User::all();
   
        return view('contacts.show',compact('contact'));
=======

        # ToDo: Create a Gate for Show Contact

        return view('contacts.show', compact('contact'));

>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Contact $contact): View
    {
<<<<<<< HEAD
        //
        $this->authorize('update-contacts', $contact);
        $this->authorize('can-view-own-cont',$contact);
        $account = Account::all();
        $organization= organization::all();
        return view('contacts.edit',compact('contact','account','organization'));
=======
        $this->authorize('update-contact', $contact);

        # Only getting Account and Organization that the contact can join
        $account = $contact->account;
        $organization = $contact->organization;

        return view('contacts.edit', compact('contact','account','organization'));

>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function update(Request $request, contact $contact): RedirectResponse
    {
<<<<<<< HEAD
        //
        $this->authorize('update-contacts', $contact);
        $request->validate([
=======
        $this->authorize('update-contacts', $contact);

        $validatedRequest = Validator::make($request->all(), [
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'city'=> 'required',
            'phone' => 'required',
            'country'=> 'required',
            'region'=> 'required',
            'address'=> 'required',
            'postal_code'=> 'required',
            'account_id'=> 'required',
            'organization_id'=> 'required',
        ])->validate();

        # See Store Methods for comments

        $contact->update($validatedRequest);

        return redirect()->route('contacts.index')->with('success','Contact Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(contact $contact): RedirectResponse
    {
        $this->authorize('delete-contacts', $contact);
<<<<<<< HEAD
         $contact->delete();
=======
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1

        $contact->delete();

        return redirect()->route('contacts.index')->with('success','Contact Deleted.');
    }
}
