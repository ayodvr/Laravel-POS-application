<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Supplier;
use App\Product;
use App\Receving;
use App\Recevingitem;
use App\RecevingPayment;
use App\RecevingTemp;
use App\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receivings = Receving::orderBy('id', 'desc')->first();
        //dd($receivings);
        $suppliers = Supplier::all();
        return view('receiving.index')->with('suppliers', $suppliers); 
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
        //dd($request->all());
        $this->validate($request,[

            'supplier_id'=>'required',
            'payment_type'=>'required',
            'total'=>'required',
            'payment'=>'required'
    
            ]);
    
            $receivingItems = RecevingTemp::all();
           // dd($receivingItems);
            if(empty($receivingItems->toArray())) {
                notify()->error("Please Add some Items to create purchase!","Error");
                return back();
            }
    
            $receiving = new Receving;
            $receiving->supplier_id = $request->supplier_id;
            $receiving->user_id = Auth::user()->id;
            $receiving->payment_type = $request->payment_type;
            $payment = $receiving->payment = $request->payment;
            $total = $receiving->total = $request->total;
            $dues = $receiving->dues = $total - $payment;
            $receiving->comments = $request->comments;

            if ($dues > 0) {
                $receiving->status = 0;
            } else {
                $receiving->status = 1;
            }
            $receiving->save();
    
            $supplier = Supplier::findOrFail($receiving->supplier_id);
            $supplier->prev_balance = $supplier->prev_balance + $dues;
            $supplier->update();
            if ($request->payment > 0) {
                $payment = new RecevingPayment;
                $paid = $payment->payment = $request->payment;
                $payment->dues = $total - $paid;
                $payment->payment_type = $request->payment;
                $payment->comments = $request->comments;
                $payment->receiving_id = $receiving->id;
                $payment->user_id = Auth::user()->id;
                $payment->save();
            }
    
            $receivingItemsData=[];
            foreach ($receivingItems as $value) {
                $receivingItemsData = new RecevingItem;
                $receivingItemsData->receiving_id = $receiving->id;
                $receivingItemsData->product_id = $value->product_id;
                $receivingItemsData->cost_price = $value->cost_price;
                $receivingItemsData->quantity = $value->quantity;
                $receivingItemsData->total_cost = $value->total_cost;
                $receivingItemsData->save();
                //process inventory
                $products = Product::find($value->product_id);
                if ($products->type == 1) {
                    $inventories = new Inventory;
                    $inventories->product_id = $value->product_id;
                    $inventories->user_id = Auth::user()->id;
                    $inventories->in_out_qty = -($value->quantity);
                    $inventories->remarks = 'PURCHASE' . $receiving->id;
                    $inventories->save();
                    //process product quantity
                    $products->quantity = $products->quantity - $value->quantity;
                    $products->save();
                } 
            }
    
             //delete all data on SaleTemp model
             RecevingTemp::truncate();
             $itemsreceiving = RecevingItem::where('receiving_id', $receivingItemsData->receiving_id)->get();
             notify()->success("You have successfully added Purchases!","Success");
                 return view('receiving.complete')
                     ->with('receiving', $receiving)
                     ->with('receivingItemsData', $receivingItemsData)
                     ->with('receivingItems', $itemsreceiving);
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
        //
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
