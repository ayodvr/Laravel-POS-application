<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_category = ExpenseCategory::all();
        return view('expense_cat.index')->with('expense_categories', $expense_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense_cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request,[
            'name'=> 'required|max:150',
            'description'=> 'required|max:150'
        ]);

        $expense_cat = new ExpenseCategory;
        $expense_cat->name = $request->name;
        $expense_cat->description = $request->description;
        $expense_cat->slug = Str::slug($request->description);

        $expense_cat->save();
        notify()->success('Expense Category added successfully!','Success');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense_cat = ExpenseCategory::findOrFail($id);
        $expense_cats = ExpenseCategory::all();
        return view('expense_cat.show')->with('expense_cat', $expense_cat)
                                        ->with('expense_cats',$expense_cats);
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
