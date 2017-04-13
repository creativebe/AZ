<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permission');
    }
    /**
     * Show all Permissions
     * @return JSON $data;
     */
    public function showAll()
    {
        $permissions = Permission::all();
        $count = $permissions->count();
        $data = ['data'=> $permissions,
                 'count' => $count
        ];
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = New Permission;
        $permission->name = request('name');
        $permission->display_name = request('display_name');
        $permission->description = request('description');
        $permission->save();
        
        return ['message' => 'Permission created'];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        return response()->json($permission);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = request('name');
        $permission->display_name = request('display_name');
        $permission->description = request('description');
        $permission->save();
        // return response()->json($role);
        return ['message' => 'Permission updated'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return ['message' => 'Permission deleted'];
    }
    /**
     * Permission to Role Relationship
     * @param  int $id id Permission
     * @return \Illuminate\Http\Response
     */
    public function permission_role($id)
    {
        $role = Role::find($id);
        $permissionrole = $role->permissions;
        $permission = array();
        foreach ($permissionrole as $pr) {
            // $s = Role::find($pr);
            $permission[] = $pr->id;
        }
        return response()->json($permission);
    }
}
