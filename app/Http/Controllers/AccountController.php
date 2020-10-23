<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('id','asc')->get();
        return view('accounts.index')->with('accounts',$accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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

            'account_no' => 'max:100',
            'name' => 'required|max:100',
            'company' => 'required|max:100',
            'branch' => 'max:100',
            'email' => 'max:100',
            'balance' => 'required|numeric|max:9999999999'
        ]);

            $account = new Account;

            $account->account_no = $request->account_no;
            $account->name = $request->name;
            $account->company = $request->company;
            $account->branch = $request->branch;
            $account->user_id = auth()->user()->id;
            $account->email = $request->email;
            $account->balance = $request->balance;

            $account->save();

            notify()->success("Account Created!","Success");
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
        $account = Account::findorfail($id);

        return view('accounts.edit')->with('account',$account);
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

            'account_no' => 'max:100',
            'name' => 'required|max:100',
            'company' => 'required|max:100',
            'branch' => 'max:100',
            'email' => 'max:100',
            'balance' => 'required|numeric|max:9999999999'
        ]);

             $account = Account::find($id);
            
             $account->account_no = $request->account_no;
             $account->name = $request->name;
             $account->company = $request->company;
             $account->branch = $request->branch;
             $account->email = $request->email;
             $account->balance = $request->balance;

             $account->save();

             notify()->success("Account Updated!","Success");
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
        $account = Account::find($id);

        $account->delete();
        
        notify()->success("Account Deleted!","Success");
        return redirect()->back();
    }
}
