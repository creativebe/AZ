<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles',compact('roles'));
    }

    /**
     * Show all roles
     * @return response()->json('Roles')
     */
    public function showAll()
    {
        $roles = Role::all();
        $count = $roles->count();
        $data = ['data'=> $roles,
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
            'name' => 'required|unique:roles,name',
        ]);

        $role = New Role;
        $role->name = request('name');
        $role->display_name = request('display_name');
        $role->description = request('description');
        $role->save();
        
        return ['message' => 'Role created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Mengambil role berdasarkan id
     * @param  Object role
     * @return Object  App\Role
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return response()->json($role);
    }

    /**
     * Mendapatkan Role dari user.
     * @param  int $id id dari user
     * @return Object App\Role;
     */
    public function getRole($id)
    {
        $usr = User::find($id);
        $role = $usr->roles;
        return $role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($roleid)
    {
        $this->validate(request(),[
            'name' => 'required',
        ]);

        $role = Role::find($roleid);
        $role->name = request('name');
        $role->display_name = request('display_name');
        $role->description = request('description');
        $role->save();
        // return response()->json($role);
        return ['message' => 'Role updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return ['message' => 'Role deleted'];
    }
    public function role_permission_update(Request $req, $id)
    {
        $request = $req->get('permission');
        $role = Role::find($id);
        if(!empty($request))
        {
            $role->permissions()->sync($request);
        }
        else
        {
            $role->permissions()->sync([]);
        }
        return ['message' => 'Updated'];
    }
}
