<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminProfile;
use App\Staffs;
use App\User;
use App\Customers;
use App\Product;
use App\Supplier;
use App\Sale;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use RealRashid\SweetAlert\Facades\Alert;




class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin_dashboard()
    {
        if(Auth()->user()->usertype == 'Admin'){

            $id = Auth::user()->id;
            $items = Product::where('type', 1)->count();
            $customers = Customers::count();
            $staff = Staffs::count();
            $sales = DB::table('sales')->where('user_id', $id)->sum('payment');
            // $incomeexpensechart = $this->incomeExpenseChart();
            return view("adminprofile.dashboard")
            ->with('items', $items)
            ->with('staff', $staff)
            ->with('customers', $customers)
            ->with('sales', $sales);
            // ->with('incomeexpensechart', $incomeexpensechart);

        }
                                    
    }

    public function getMonthListFromDate(Carbon $start)
    {
        foreach (CarbonPeriod::create($start, '1 month', Carbon::today()) as $month){
            $months[$months[$month->format('m-Y')]] = $month->format('F Y');
        }
            return $months;
    }

    public function incomeExpenseChart()
    {
        $monthsOfYear = $this->getMonthListFromDate();
        $incomes = Sale::whereBetween('created_at', [ $monthsOfYear[0], $monthsOfYear[11]])->get();
        $expenses = Receiving::whereBetween('created_at', [ $monthsOfYear[0], $monthsOfYear[11]])->get();
        $chartArray = array();
        foreach ($monthsOfYear as $month) {
            $monthlyincome = "0";
            $monthlyexpense = "0";
            $monthlyincome = Sale::whereBetween('created_at', [ $month ])->count();
            $monthlyexpense = Receiving::whereBetween('created_at', [ $month ])->count();
            $chart = [
                // 'y' => $month,
                'a' => $monthlyexpense,
                'b'=>$monthlyincome,
            ];
            $chartArray[] =  $chart;
           
        }
        return $chartArray;
    }

    public function index()
    {
        $admins = AdminProfile::all();
        return view("adminprofile.index")->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminprofile.create");
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

            'address' => 'required',
            'phone' => 'required',
            'no_of_staff' => 'required',
            'admin_image' => 'image|nullable|max:1999',
            'objective' => 'required',
            'company_name' => 'required'

        ]);

        //Handle file upload
        if($request->hasFile('admin_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('admin_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('admin_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('admin_image')->storeAs('public/admin_image',$fileNameToStore);
            }else {
                $fileNameToStore = 'noimage.jpg';
                }


            $admin = new AdminProfile;
            $admin->address = $request->address;
            $admin->user_id = auth()->user()->id;
            $admin->user_name = auth()->user()->name;
            $admin->user_email = auth()->user()->email;
            $admin->user_usertype = auth()->user()->usertype;
            $admin->phone = $request->phone;
            $admin->no_of_staff = $request->no_of_staff;
            $admin->admin_image = $fileNameToStore;
            $admin->objective = $request->objective;
            $admin->company_name = $request->company_name;
            
           if($admin->save()){
               
            notify()->success("Profile Created!","Success");
           }
           else{
            notify()->error("There was a problem creating your profile!","Error");
           }
            
            

            return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $admin = AdminProfile::find($id);
      //dd($admin);
      return view('adminprofile.show')->with('admin',$admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $admin = AdminProfile::find($id);
        //dd($admin->all());
      return view('adminprofile.edit')->with('admin',$admin);
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
       dd($request->all());
        $this->validate($request,[

            'address' => 'required',
            'phone' => 'required',
            'no_of_staff' => 'required',
            'objective' => 'required',
            'company_name' => 'required'
        ]);

        if($request->hasFile('admin_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('admin_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('admin_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('admin_image')->storeAs('public/admin_image',$fileNameToStore);
            } 

            $admin = AdminProfile::find($id);
            $admin->address = $request->address;
            $admin->phone = $request->phone;
            $admin->no_of_staff = $request->no_of_staff;
            $admin->objective = $request->objective;
            $admin->company_name = $request->company_name;
            
            if($request->hasFile('admin_image')){
                $admin->admin_image = $fileNameToStore;
            }

            if($admin->save()){
             notify()->success("Profile Updated!","Success");

            }else{
                notify()->error("There was a problem creating your profile!","Error");
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
        $admin_user = User::whereId($id);
       //dd($admin_user);
        /*if($admin_user->admin_image !== 'noimage.jpg'){
        //Delete image
            Storage::delete('public/admin_image/'.$admin_user->admin_image);
        }*/
        $admin_user->delete();
        return redirect('/');
    }

}
