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

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::orderBy('id','desc')->get();
        return view('customers.index')->with('customers',$customers);
        
    }

    // public function Customer_PDF()
    // {
    //     $customer_pdf = Customers::orderBy('id','desc')->get();
      
    //     $filename = 'Customers_list.pdf';
    //     $mpdf = new \Mpdf\Mpdf([
    //         'margin-left' => 10,
    //         'margin-left' => 10,
    //         'margin-left' => 15,
    //         'margin-left' => 20,
    //         'margin-left' => 10,
    //         'margin-left' => 10
    //     ]);

    //     $html = \View::make('customers.customerPDF')->with('customer_pdf',$customer_pdf);
    //     $html = $html->render();

    //     $mpdf->setHeader('xxxx|Customers|{PAGENO}');
    //     $mpdf->setFooter('Copyright StockBase Inc');
    //     $stylesheet = file_get_contents(url('css/customer_pdf.css'));
    //     $mpdf->WriteHTML($stylesheet,1);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output($filename,'I');
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
         
            'avatar'=>'image|nullable|max:1999',
            'name'=>'max:185',
            'email'=>'max:100',
            'address'=>'max:185',
            'city'=>'max:185',
            'state'=>'max:185',
            'company_name'=>'max:150',
            'account'=>'max:150',
            'zip'=>'max:10',
            'phone_number'=>'max:20',
            'prev_balance'=>'max:999999|numeric',
            'payment'=>'max:999999|numeric|nullable'
        ]);

             //Handle file uploads
        if($request->hasFile('avatar')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('avatar')->storeAs('public/avatar',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
            }
            //dd($request->all());
            $customer = new Customers;
            
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->avatar = $fileNameToStore;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->company_name = $request->company_name;
            $customer->account = $request->account;
            $customer->prev_balance = $request->prev_balance;
            $customer->payment = $request->payment;
            
            if($customer->save()){

                notify()->success("Customer Added!","Success");

            }else{
                notify()->error("There was a problem creating customer!","Error");
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
        $customer = Customers::find($id);
        return view('customers.show')->with('customer',$customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::findorfail($id);
        return view('customers.edit')->with('customer',$customer);
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

            'name'=>'max:185',
            'email'=>'max:100',
            'address'=>'max:185',
            'city'=>'max:185',
            'state'=>'max:185',
            'company_name'=>'max:50',
            'account'=>'max:50',
            'zip'=>'max:10',
            'phone_number'=>'max:20',
            'prev_balance'=>'max:999999|numeric',
            'payment'=>'max:999999|numeric|nullable'
        ]);

        if($request->hasFile('avatar')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('avatar')->storeAs('public/avatar',$fileNameToStore);
            } 

            //dd($request->all());
           // dd("am here");
            $customer = Customers::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->company_name = $request->company_name;
            $customer->account = $request->account;
            $customer->prev_balance = $request->prev_balance;
            $customer->payment = $request->payment;
            
            if($request->hasFile('avatar')){
                $customer->avatar = $fileNameToStore;
            }

            if($customer->save()){
                
                notify()->success("Customer Updated!","Success");

            }else{
                notify()->error("There was a problem creating your profile!","Error");
               }

               return redirect()->route('customers.index');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::findorfail($id);

        $customer->delete();
        
        notify()->success("Customer Deleted!","Success");

        return redirect()->back();
    }
}
