<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\RecevingTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ReceivingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(RecevingTemp::with('product')->get());
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
        $type = $request->type;
        if ($type == 1) {
            $ReceivingTemps = new RecevingTemp;
            $ReceivingTemps->product_id = $request->product_id;
            $ReceivingTemps->cost_price = $request->cost_price;
            $ReceivingTemps->total_cost = $request->total_cost;
            $ReceivingTemps->quantity = 1;
            $ReceivingTemps->save();
            return $ReceivingTemps;
        } 
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
        $ReceivingTemps = RecevingTemp::find(3);
        $ReceivingTemps->quantity = 5;
        $ReceivingTemps->total_cost = 54;
        $ReceivingTemps->save();
        return $ReceivingTemps;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RecevingTemp::destroy($id);
    }
}
