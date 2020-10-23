<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Customers;
use App\Product;
use App\Sale;
use App\SaleItem;
use App\SalePayment;
use App\SaleTemp;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('id', 'desc')->first();
        //dd($sales);
        $customers = Customers::all();
        return view('sales.index')->with('customers', $customers);
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

        'customer_id'=>'required',
        'payment_type'=>'required',
        'subtotal'=>'required',
        'payment'=>'required'

        ]);

        $saleItems = SaleTemp::all();
        //dd($saleItems);
        if(empty($saleItems->toArray())) {
            notify()->error("Please Add some Items to create sale!","Error");
            return back();
        }

        $sales = new Sale;
        $sales->customer_id = $request->customer_id;
        $sales->user_id = Auth::user()->id;
        $sales->payment_type = $request->payment_type;
        $discount = $request->discount;
        $discount_percent = $request->discount_percent;
        $subtotal = $request->subtotal;
        

        $total_discount = $discount + ($discount_percent * $subtotal)/100;
        $sales->discount = $total_discount;
        $tax = $sales->tax = ($subtotal*0)/100;
        $total = $sales->grand_total = $subtotal + $tax - $total_discount;
        //insert payment data in the payment table
        $payment = $sales->payment = $request->payment;
        $dues= $sales->dues = $total - $payment;
        if ($dues > 0) {
            $sales->status = 0;
        } else {
            $sales->status = 1;
        }
        $sales->save();

        $customer = Customers::findOrFail($sales->customer_id);
        $customer->prev_balance = $customer->prev_balance + $sales->dues;
        $customer->update();
        if ($request->payment > 0) {
            $payment = new SalePayment;
            $paid = $payment->payment = $request->payment;
            $payment->dues = $total - $paid;
            $payment->payment_type = $request->payment;
            $payment->comments = $request->comments;
            $payment->sale_id = $sales->id;
            $payment->user_id = Auth::user()->id;
            $payment->save();
        }

        foreach ($saleItems as $value) {
            $saleItemsData = new SaleItem;
            $saleItemsData->sale_id = $sales->id;
            $saleItemsData->product_id = $value->product_id;
            $saleItemsData->cost_price = $value->cost_price;
            $saleItemsData->selling_price = $value->selling_price;
            $saleItemsData->quantity = $value->quantity;
            $saleItemsData->total_cost = $value->total_cost;
            $saleItemsData->total_selling = $value->total_selling;
            $saleItemsData->save();
            //process inventory
            $products = Product::find($value->product_id);
            if ($products->type == 1) {
                $inventories = new Inventory;
                $inventories->product_id = $value->product_id;
                $inventories->user_id = Auth::user()->id;
                $inventories->in_out_qty = -($value->quantity);
                $inventories->remarks = 'SALE' . $sales->id;
                $inventories->save();
                //process product quantity
                $products->quantity = $products->quantity - $value->quantity;
                $products->save();
            } 
        }

         //delete all data on SaleTemp model
         SaleTemp::truncate();
         $itemssale = SaleItem::where('sale_id', $saleItemsData->sale_id)->get();
         notify()->success("You have successfully added sales!","Success");
             return view('sales.complete')
                 ->with('sales', $sales)
                 ->with('saleItemsData', $saleItemsData)
                 ->with('saleItems', $itemssale);
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
