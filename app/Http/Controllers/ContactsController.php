<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Http\Resources\ContactResourceCollection;
use App\Http\Resources\ContactResource;
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
    public function index()
    {

        # Model:all(), is not recommended as it may affect performance
        # Double Where Clause can be simplified to 1 where clause with Array
       #'
        $user = auth()->user();
        $contacts = $user->hasRole('super_admin')
            ? Contact::paginate(5)
            : Contact::where([
                    'account_id' => $user->account_id,
                    'organization_id' => $user->organization_id
               ])->paginate(10);

        
 
       

        return new ContactResourceCollection($contacts);
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

        $this->authorize('create-contact', $contact);

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
    public function store(Request $request,Contact $contact): RedirectResponse
    {
        # ToDo: Gate for Store Contact
          $this->authorize('store-contact',$contact);
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
        $contact =  Contact::create($validatedRequest);

           return response()->json([
            'status' => true,
            'message' => "Contact Created successfully!",
            'post' => new ContactResource($contact)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return View
     */
    public function show(contact $contact)
    {

        $this->authorize('read-contact',$contact);
        # ToDo: Create a Gate for Show Contact
        $account = $contact->account;
        $organization = $contact->organization;

        return new ContactResource($contact);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Contact $contact)
    {
        $this->authorize('update-contact', $contact);

        # Only getting Account and Organization that the contact can join
        $account = $contact->account;
        $organization = $contact->organization;

        return [new ContactResource($contact),"account"=>$account,];

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
        $this->authorize('update-contact', $contact);

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

      
        return response()->json([
            'status' => true,
            'message' => "Contact Created successfully!",
            'post' => new ContactResource($contact)
        ], 200);
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
        $this->authorize('delete-contact', $contact);

        $contact->delete();

        response()->json([
            'status' => true,
            'message' => "Contact Deleted successfully!",
        ], 200);
    }
}
