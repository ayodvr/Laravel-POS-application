<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderBy('id','desc')->get();
        $expense_category = ExpenseCategory::pluck('name','id');
        //dd($expenses);
        return view('expense.index')->with('expenses',$expenses)->with('expense_category',$expense_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expense_categories = ExpenseCategory::orderBy('id','desc')->get();
        return view('expense.create')->with('expense_categories',$expense_categories);
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
        
            'expense_category_id'=>'required',
            'description'=>'required',
            'payment'=>'required|numeric|max:9999999999',
            'dues'=>'numeric|max:9999999999',
            'total'=>'numeric|max:9999999999',
            'unit_price'=>'numeric|max:9999999999',
            'qty'=>'integer|max:9999999999',
            'payment_type'=>'required|max:50'
        ]);

            $expense = new Expense();
            $expense->expense_category_id = $request->expense_category_id;
            $expense->description = $request->description;
            $qty = $expense->qty = $request->qty;
            $unit_price = $expense->unit_price = $request->unit_price;
            $total = $expense->total = $qty * $unit_price;
            $payment = $expense->payment = $request->payment;
            $expense->dues = $total -$payment;
            $expense->payment_type = $request->payment_type;
            $expense->user_id = auth()->user()->id;
            $expense->save();

            notify()->success('Expense Created Successfully!','Success');
            return view('expense.index');
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
        $expense = Expense::find($id);
        $expense_cat = ExpenseCategory::all();
        //dd($expense_cat);
        return view('expense.edit')->with('expense',$expense)
                                    ->with('expense_cat',$expense_cat);

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
            
            'expense_category_id'=>'required|integer|exists:expense_categories,id',
            'description'=>'required',
            'payment'=>'required|numeric|max:9999999999',
            'dues'=>'numeric|max:9999999999',
            'total'=>'numeric|max:9999999999',
            'unit_price'=>'numeric|max:9999999999',
            'qty'=>'integer|max:9999999999',
            'payment_type'=>'required|max:50'
        ]);

            $expense = Expense::find($id);
            $expense->expense_category_id = $request->expense_category_id;
            $expense->description = $request->description;
            $qty = $expense->qty = $request->qty;
            $unit_price = $expense->unit_price = $request->unit_price;
            $total = $expense->total = $qty * $unit_price;
            $payment = $expense->payment = $request->payment;
            $expense->dues = $total -$payment;
            $expense->payment_type = $request->payment_type;

            $expense->save();

            notify()->success('Expense category created!','Success');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findorfail($id);

        $expense->delete();

        notify()->success('Expense deleted!','Success');
    }
}
