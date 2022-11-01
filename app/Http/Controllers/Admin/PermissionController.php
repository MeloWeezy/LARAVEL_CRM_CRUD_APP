<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\PermissionResourceCollection;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return new PermissionResourceCollection($permissions);
    }

    # ToDo: @Melusi removed unused code
    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required']]);
        $permission = Permission::create($validated);

        return response()->json([
            'status' => true,
            'message' => "Permission Created successfully!",
            'Permission' => new PermissionResource($permission)
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(['name' => ['required', 'min:3'], 'guard_name' => 'required']);
        $permission = Permission::where('id', $id)->get();
        $permission = $permission->each->update($validated);

        return response()->json([
            'message' => 'success',
            'data' => [
                'permission' => $permission
            ]
        ], Response::HTTP_OK);
    }

    public function destroy(Permission $permission)
    {

        $permission->delete();
        return response()->json([
            'status' => true,
            'message' => "Permission Deleted successfully!",
        ], Response::HTTP_OK);

    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return response()->json([
                'status' => false,
                'message' => "Role Already exists"
            ], Response::HTTP_OK);
        }

        $permission->assignRole($request->role);
        return response()->json([
            'status' => True,
            'message' => "Role Assigned"
        ], Response::HTTP_OK);
    }

    # ToDo: @Melusi Implement API
    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}

