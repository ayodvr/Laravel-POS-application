<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::find($id);
        $inventories = Inventory::all();
        return view('inventory.edit')
            ->with('products', $products)
            ->with('inventory', $inventories);
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
        //
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
        $this->validate($request,[

        'in_out_qty' =>'required|numeric|max:999999999',
        'remarks'=>'required|max:255'
     ]);
        
        $products = product::find($id);
        $products->quantity = $products->quantity + $request->in_out_qty;
        $products->save();

        $inventories = new Inventory;
        $inventories->products_id = $id;
        $inventories->user_id = Auth::user()->id;
        $inventories->in_out_qty = $request->in_out_qty;
        $inventories->remarks = $request->remarks;
        $inventories->save();

        notify()->success("You have successfully updated product!","Success");
        return view('inventories.edit');
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
