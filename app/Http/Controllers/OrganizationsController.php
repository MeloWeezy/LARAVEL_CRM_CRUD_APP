<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OrganizationResourceCollection;
use App\Http\Resources\OrganizationResource;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return OrganizationResourceCollection
     */
    public function index(): OrganizationResourceCollection
    {
        $user = auth()->user();

        if ($user->hasRole('super_admin'))
            return new OrganizationResourceCollection(Organization::paginate(10));

        if ($user->hasRole('admin'))
            return new OrganizationResourceCollection(Organization::where('id', $user->organization_id)->paginate(5));

        return new OrganizationResourceCollection(Organization::where('id', $user->organization_id)->paginate());
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
        return view('organizations.create')->with('account', $account);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Organization $organization): JsonResponse
    {
        //
        //
        $this->authorize('store-organization', $organization);
        $validatedRequest = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'region' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'account_id' => 'required'
        ])->validate();


        $organization = organization::create($validatedRequest);

        $account = auth()->user()->account;

        return response()->json([
            'status' => true,
            'Account' => $account,
            'message' => "Organization Created successfully!",
            'Organization' => new OrganizationResource($organization)
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\organization $organizations
     * @return \Illuminate\Http\Response
     */
    public function show(organization $organization): JsonResponse
    {
        //


        $this->authorize('read-organization', $organization);
        $account = auth()->user()->account;


        return response()->json([
            'status' => true,
            'account' => new OrganizationResource($organization)
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\organization $organizations
     * @return \Illuminate\Http\Response
     */
    public function edit(organization $organization)
    {

        $this->authorize('update-organization', $organization);
        $account = auth()->user()->account;

        return new OrganizationResource($organizations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\organization $organizations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organization $organization) : JsonResponse
    {
        //

        $this->authorize('update-organization', $organization);
        $validatedRequest = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'region' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'account_id' => 'required'
        ])->validate();


        $organization->update($validatedRequest);

        return response()->json([
            'status' => true,
            'message' => "Organization Updated successfully!",
            'organization' => $organization
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\organization $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy(organization $organization) : JsonResponse
    {
        //
        $this->authorize('delete-organizations', $organization);


        $organization->delete();


        return response()->json([
            'status' => true,
            'message' => "Organization Deleted successfully!",
        ], Response::HTTP_OK);
    }
}
