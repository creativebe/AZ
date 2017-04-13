<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customer;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'no_plat' => 'required|unique:cars,no_plat',
        ]);

        $Customer = Customer::find(request('cust_id'));
        $Car = New Cars;
        $Car->no_plat = request('no_plat');
        $Car->type = request('type');
        $Car->merk = request('merk');
        $Car->tahun = request('tahun');
        $Car->save();
        $Customer->cars()->save($Car);
        
        return ['message' => "Member's car created"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id))
        {
            $Customer = Customer::find($id);
            $cars = $Customer->cars()->get();    
        }
        else
        {
            $column = 'no_plat';
            $cars = Cars::where($column, '=', $id)->first();
        }

        return response()->json($cars);
    }

    public function showByPlat($no_plat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Car = Cars::find($id);

        return response()->json($Car);
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
            'no_plat' => 'required',
        ]);

        $Car = Cars::find($id);
        $Car->no_plat = request('no_plat');
        $Car->merk = request('merk');
        $Car->type = request('type');
        $Car->tahun = request('tahun');
        $Car->save();
        // return response()->json($role);
        return ['message' => 'Car updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
