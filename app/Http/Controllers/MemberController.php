<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            'name' => 'required',
            'no_tlp' => 'required'
        ]);

        $Customer = New Customer;
        $Customer->name = request('name');
        $Customer->alamat = request('alamat');
        $Customer->no_tlp = request('no_tlp');
        $Customer->save();
        
        return ['message' => 'Member created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JSON $data;
     */
    public function show($id)
    {
        $Customer = Customer::find($id);
        return response()->json($Customer);
    }

    /**
     * Show All Customer
     * @return [type] [description]
     */
    public function showAll()
    {
        $Customer = Customer::all();
        $count = $Customer->count();
        $data = ['data' => $Customer, 
                 'count' => $count
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(),[
            'name' => 'required',
            'no_tlp' => 'required',
        ]);

        $Customer = Customer::find($id);
        $Customer->name = request('name');
        $Customer->alamat = request('alamat');
        $Customer->no_tlp = request('no_tlp');
        $Customer->save();
        // return response()->json($role);
        return ['message' => 'Customer data updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Customer = Customer::find($id);
        $Customer->delete();
        return ['message' => 'Customer deleted'];
    }
}
