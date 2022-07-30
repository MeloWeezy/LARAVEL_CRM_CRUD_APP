<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {

        # Model:all(), is not recommended as it may affect performance
        # Double Where Clause can be simplified to 1 where clause with Array

        $user = auth()->user();
        $contact = $user->hasRole('super_admin')
            ? Contact::paginate(10)
            : Contact::where([
                    'account_id' => $user->account_id,
                    'organization_id' => $user->organization_id
                ])->paginate(10);

        return view('contacts.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */

    public function create(Contact $contact): View
    {
        # ToDo: Fix Gate Name
        # Getting Account and Organization using relationships is more efficient than all()

        $this->authorize('create-organizations', $contact);

        $account = auth()->user()->account;
        $organization = auth()->user()->organization;

        return view('contacts.create', compact('account', 'organization'));

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

        # ToDo: Create a Gate for Show Contact

        return view('contacts.show', compact('contact'));

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
        $this->authorize('update-contact', $contact);

        # Only getting Account and Organization that the contact can join
        $account = $contact->account;
        $organization = $contact->organization;

        return view('contacts.edit', compact('contact','account','organization'));

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
        $this->authorize('update-contacts', $contact);

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

        $contact->delete();

        return redirect()->route('contacts.index')->with('success','Contact Deleted.');
    }
}
