<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;
use App\Product;
use App\SaleTemp;
use Illuminate\Support\Facades\Response;

class SaleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Response::json(SaleTemp::with('product')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SaleTemps = new SaleTemp;
        $SaleTemps->product_id = $request->product_id;
        $SaleTemps->cost_price = $request->cost_price;
        $SaleTemps->selling_price = $request->selling_price;
        $SaleTemps->quantity = 1;
        $SaleTemps->total_cost = $request->cost_price;
        $SaleTemps->total_selling = $request->selling_price;
        $SaleTemps->save();
        return $SaleTemps;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $SaleTemps = SaleTemp::find($id);
        $SaleTemps->quantity = $request->quantity;
        $SaleTemps->total_cost = $request->cost_price;
        $SaleTemps->total_selling = $request->selling_price;
        $SaleTemps->save();
        return $SaleTemps;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SaleTemp::destroy($id);
    }
}
