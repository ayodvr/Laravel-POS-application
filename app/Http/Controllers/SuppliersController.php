<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Staffs;
use App\User;
use App\AdminProfile;
use DB;
use App\Customers;
use App\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id','asc')->get();
        return view('supplier.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
         
            'sup_img'=>'image|nullable|max:1999',
            'name'=>'required|max:185',
            'email'=>'required|max:100',
            'address'=>'required|max:185',
            'company_name'=>'required|max:50',   
            'phone'=>'required|max:20',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',  
            'account'=>'max:20',
            'prev_balance'=>'max:9999999999|numeric',
            'payment'=>'max:9999999999|numeric|nullable' ,
            'postal_code'=>'required'
        ]);

             //Handle file uploads
        if($request->hasFile('sup_img')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('sup_img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('sup_img')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('sup_img')->storeAs('public/sup_img',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
            }
            //dd($request->all());
            $supplier = new Supplier;
            
            $supplier->name = $request->name;
            $supplier->category = $request->category;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->sup_img = $fileNameToStore;
            $supplier->address = $request->address;
            $supplier->company_name = $request->company_name;
            $supplier->city = $request->city;
            $supplier->state = $request->state;
            $supplier->country = $request->country;
            $supplier->postal_code = $request->postal_code;
            $supplier->comments = $request->comments;
            $supplier->payment = $request->payment;
            $supplier->prev_balance = $request->prev_balance;
            $supplier->account = $request->account;
            
            
            if($supplier->save()){

                notify()->success("Supplier Added!","Success");

            }

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
        $supplier = Supplier::findorfail($id);
        return view('supplier.edit')->with('supplier',$supplier);
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

            'name'=>'required|max:185',
            'email'=>'required|max:100',
            'address'=>'required|max:185',
            'company_name'=>'required|max:50',   
            'phone'=>'required|max:20',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',   
            'postal_code'=>'required',
            'account'=>'max:20',
            'prev_balance'=>'max:9999999999|numeric',
            'payment'=>'max:9999999999|numeric|nullable'
        ]);

            //Handle file uploads
            if($request->hasFile('sup_img')){
                //Get file name with the extension
                $fileNameWithExt = $request->file('sup_img')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('sup_img')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload image
                $path = $request->file('sup_img')->storeAs('public/sup_img',$fileNameToStore);
                } else {
                $fileNameToStore = 'noimage.jpg';
                }

            //dd($request->all());
           // dd("am here");
            $supplier = Supplier::find($id);

            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->company_name = $request->company_name;
            $supplier->city = $request->city;
            $supplier->state = $request->state;
            $supplier->country = $request->country;
            $supplier->postal_code = $request->postal_code;
            $supplier->comments = $request->comments;
            $supplier->payment = $request->payment;
            $supplier->prev_balance = $request->prev_balance;
            $supplier->account = $request->account;
            
            if($request->hasFile('sup_img')){
                $supplier->sup_image = $fileNameToStore;
            }

            if($supplier->save()){
                
                notify()->success("Supplier Updated!","Success");

            }

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
        $supplier = Supplier::findorfail($id);

        $supplier->delete();
        
        notify()->success("Supplier Deleted!","Success");

        return redirect()->back();
    }
}
