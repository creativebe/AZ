<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service');
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
            'name' => 'required|unique:services,name',
            'display_name' => 'required',
            'harga' => 'required',
        ]);

        $service = New Services();
        $service->kode = $this->generateKode();
        $service->name = $request->name;
        $service->display_name = $request->display_name;
        $service->description = $request->description;
        $service->harga = $request->harga;
        $service->save();

        return ['message' => 'Service created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Services::find($id);
        return response()->json($service);
    }

    public function showAll()
    {
        $service = Services::all();
        $count = $service->count();
        $data = ['data'=> $service,
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
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'name' => 'required',
            'display_name' => 'required',
            'harga' => 'required',
        ]);

        $service = Services::find($id);
        $service->name = $request->name;
        $service->display_name = $request->display_name;
        $service->description = $request->description;
        $service->harga = $request->harga;
        $service->save();

        return ['message' => 'Service updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Services::find($id);
        $service->delete();
        return ['message' => 'Service deleted'];
    }

    /**
     * Generate Kode Service
     * @return string generated kode
     */
    public function generateKode()
    {
        $service = Services::whereNotNull('id')->orderBy('id','desc')->first();
        $prefix = 'SRV-';

        if($service == null)
        {
            $num = 1;
        }
        else
        {
            $num = $service->id+1;    
        }

        $kode = $prefix.$num;
        return $kode;
    }
}
