<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountResourceCollection;
use App\Models\Account;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AccountResourceCollection
     */
    public function index(): AccountResourceCollection
    {
        $user = auth()->user();
        $accounts = $user->hasRole('super_admin')
            ? Account::paginate(10)
            : Account::where(['id' => $user->account_id])->get();

        return new AccountResourceCollection($accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->authorize('store-account');

        $validatedRequest = Validator::make($request->all(),
            [
                'name' => 'required',
            ])->validate();

        $account = Account::create($validatedRequest);

        return response()->json([
            'status' => true,
            'message' => "Account Created successfully!",
            'post' => new AccountResource($account)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Account $account
     * @return AccountResource
     * @throws AuthorizationException
     */
    public function show(Account $account): AccountResource
    {
        $this->authorize('read-account', $account);

        return new AccountResource($account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return AccountResource
     * @throws AuthorizationException
     */
    public function edit(Account $account): AccountResource
    {
        $this->authorize('update-account', $account);

        return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(Request $request, Account $account): JsonResponse
    {
        $this->authorize('update-account', $account);

        $validatedRequest = Validator::make($request->all(), [
            'name' => 'required',

        ])->validate();

        $account->update($validatedRequest);

        return response()->json([
            'status' => true,
            'message' => "Account Updated successfully!",
            'Account' => new AccountResourceCollection($account)
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Account $account): JsonResponse
    {
        $this->authorize('delete-account', $account);

        $account->delete();

        return response()->json([
            'status' => true,
            'message' => "Account Deleted successfully!",
        ], Response::HTTP_OK);
    }
}
