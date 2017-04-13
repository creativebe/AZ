<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}
	
	public function index()
	{
		$users = User::all();
		//$singleUser = $this->show($users->id);
		return view('users', compact('users'));
	}

	// public function userById($userid)
	// {
	// 	$user = User::find($userid);
	// 	return response()->json($user);

	// }
	public function getUser()
	{
		$users = User::all();
		$count = $users->count();
		$data = ['data'=> $users,
				 'count' => $count
		];
		// $users_array->push($users);
		return response()->json($data);
	}

	public function store()
	{
		$this->validate(request(),[
			'name' => 'required',
			'username' => 'required|unique:users,username',
			'email' => 'email|unique:users,email',
			'password' => 'required|confirmed'
		]);

		$user = New User;
		$user->name = request('name');
		$user->username = request('username');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		$user->save();
		
		return ['message' => 'User created'];
	}

	public function edit(User $user)
	{
		$user->get();
		return response()->json($user);
	}

	public function update(Request $req, $userid)
	{
		$this->validate(request(),[
			'name' => 'required',
			'username' => 'required',
			'email' => 'email',
		]);

		$user = User::find($userid);
		$user->update($req->all());
		// return response()->json($user);
		return ['message' => 'User updated'];

	}

	public function destroy(Request $req, $userid)
	{
		$user = User::find($userid);
		$user->delete();
		return ['message' => 'User deleted'];
	}

	public function role_user($id)
    {
        $user = User::find($id);
        $roleuser = $user->roles;
        $role = array();
        foreach ($roleuser as $ru) {
        	$s = Role::find($ru);
        	$role[] = $ru->id;
        }
        return response()->json($role);
    }
    /**
     * Update Role yang dimilik oleh user
     * @param  Request $req request dari form
     * @param  int  $id  Id user yang diambil dari form
     * @return Array['message' => 'String']      Mengembalikan pesan 'updated'
     */
    public function role_user_update(Request $req, $id)
    {
    	$request = $req->get('roles');
    	$user = User::find($id);
    	if(!empty($request))
    	{
    		$user->roles()->sync($request);
    	}
    	else
    	{
    		$user->roles()->sync([]);
    	}
    	return ['message' => 'Updated'];
    }
}
