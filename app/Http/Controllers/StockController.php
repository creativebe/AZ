<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stock');
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
            'name' => 'required|unique:stocks,name',
            'display_name' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $stock = New Stock();
        $stock->kode = $this->generateKode();
        $stock->name = $request->name;
        $stock->display_name = $request->display_name;
        $stock->description = $request->description;
        $stock->jumlah = $request->jumlah;
        $stock->satuan = $request->satuan;
        $stock->harga_beli = $request->harga_beli;
        $stock->harga_jual = $request->harga_jual;
        $stock->save();

        return ['message' => 'Stock created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);
        return response()->json($stock);
    }
    /**
     * Show All Stock
     * @return [type] [description]
     */
    public function showAll()
    {
        $stocks = Stock::all();
        $count = $stocks->count();
        $data = ['data'=> $stocks,
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
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $stock = Stock::find($id);
        $stock->name = request('name');
        $stock->display_name = request('display_name');
        $stock->description = request('description');
        $stock->name = request('name');
        $stock->display_name = request('display_name');
        $stock->description = request('description');
        $stock->jumlah = request('jumlah');
        $stock->satuan = request('satuan');
        $stock->harga_beli = request('harga_beli');
        $stock->harga_jual = request('harga_jual');

        return ['message' => 'Stock updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return ['message' => 'Stock deleted'];
    }
    /**
     * Generate Kode Stock
     * @return [type] [description]
     */
    public function generateKode()
    {
        $stocks = Stock::whereNotNull('id')->orderBy('id','desc')->first();
        $prefix = 'STK-';
        if($stocks == null)
        {
            $num = 1;
        }
        else
        {
            $num = $stocks->id+1;    
        }
        $kode = $prefix.$num;

        return $kode;
    }
}
