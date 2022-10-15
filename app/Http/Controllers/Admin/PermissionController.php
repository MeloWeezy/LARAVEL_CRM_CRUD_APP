<?php

namespace App\Http\Controllers\Admin;
use App\Http\Resources\PermissionResourceCollection;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return new PermissionResourceCollection($permissions);
    }

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
            'Permission' => new PermissionResource( $permission )
        ], 200);
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('roles', 'permission'));
    }

    public function update(Request $request, Permission $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3'],'guard_name'=>'required']);

      // $role = $role->update($validated);

        return $role;
    }

    public function destroy(Permission $permission)
    {
       
        $permission->delete();
        return response()->json([
            'status' => true,
            'message' => "Permission Deleted successfully!",
        ], 200);
       
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}

