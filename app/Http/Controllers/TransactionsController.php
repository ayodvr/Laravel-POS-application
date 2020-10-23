<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $account = Account::orderBy('id','desc')->get();   
        $transactions = Transaction::orderBy('id','asc')->get();
        return view('transactions.index')->with('transactions',$transactions)
                                        ->with('account',$account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::orderBy('id','desc')->get();
        //dd($account);
        return view('transactions.create')->with('accounts',$accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'transaction_type'=>'required',
            'account_id'=>'required',
            'transaction_with'=>'required',
            'amount'=>'required'
        ]);

            $transaction = new Transaction;

            $transaction->transaction_type = $request->transaction_type;
            $transaction->user_id = auth()->user()->id;
            $transaction->account_id = $request->account_id;
            $transaction->transaction_with = $request->transaction_with;
            $transaction->amount = $request->amount;
            $transaction->updateAccountBalance('create');
            $transaction->save();

            notify()->success("Transaction Created!","Success");
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
        $account = Account::orderBy('id','desc')->get();
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit')->with('account', $account)
                                        ->with('transaction',$transaction);
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
        notify()->error("Transaction Can not be edited!","Error");
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
        $transaction = Transaction::findorfail($id);
        $transaction->updateAccountBalance('delete');
        $transaction->delete();
        
        notify()->error("You have successfully deleted Transaction!","Error");
        return redirect()->back();
    }
}
