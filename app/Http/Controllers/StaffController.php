<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Staffs;
use App\User;
use App\AdminProfile;
use DB;

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Staff_dashboard()
    {
        if(Auth()->user()->usertype == 'User'){

            return view("staffs.dashboard");

        }else
        {
            notify()->warning("Access Denied!","Caution");
                
            return redirect()->back();
        }
        
                                    
    }

    public function index()
    {
        $staffs = Staffs::orderBy('id','asc')->get();

        return view('staffs.index')->with('staffs',$staffs);
                               
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
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

            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'photo' => 'image|nullable|max:1999',
            'date_of_birth' => 'required',
            'date_employed' => 'required',
            'department' => 'required',
            'experience' => 'required',
            'status' => 'required'
        ]);

        //Handle file uploads
        if($request->hasFile('photo')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('photo')->storeAs('public/photo',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
            }

            //dd($request->all());
            $staff = new Staffs;
            $staff->address = $request->address;
            $staff->user_id = auth()->user()->id;
            $staff->user_name = auth()->user()->name;
            $staff->user_email = auth()->user()->email;
            $staff->user_usertype = auth()->user()->usertype;
            $staff->phone = $request->phone;
            $staff->city = $request->city;
            $staff->photo = $fileNameToStore;
            $staff->slug = Str::slug($request->status);
            $staff->date_of_birth = $request->date_of_birth;
            $staff->date_employed = $request->date_employed;
            $staff ->department = $request->department;
            $staff->experience = $request->experience;
            $staff->status = $request->status;

            if($staff->save()){

                notify()->success("Profile Created!","Success");

            }else{
                notify()->error("There was a problem creating your profile!","Error");
            }

            return redirect('staff_dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $staff = Staffs::find($id);
        //$staff_info = User::find($staff);
        //dd($staff_info);
        return view('staffs.show')->with('staff',$staff);
                                    //->with('staff_info',$staff_info);
                                    
                                    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staffs::find($id);
        //$staff_info = User::find($staff);
        //dd($staff_info);
        return view('staffs.edit')->with('staff',$staff);
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

            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'date_of_birth' => 'required',
            'date_employed' => 'required',
            'department' => 'required',
            'experience' => 'required',
            'status' => 'required'
        ]);

        if($request->hasFile('photo')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('photo')->storeAs('public/photo',$fileNameToStore);
            } 
            //dd($request->all());
            $staff = Staffs::find($id);
            $staff->address = $request->address;
            $staff->phone = $request->phone;
            $staff->city = $request->city;
            $staff->date_of_birth = $request->date_of_birth;
            $staff->date_employed = $request->date_employed;
            $staff ->department = $request->department;
            $staff->experience = $request->experience;
            $staff->status = $request->status;
            
            if($request->hasFile('photo')){
                $staff->photo = $fileNameToStore;
            }

            if($staff->save()){
                
                notify()->success("Profile Updated!","Success");

            }else{
                notify()->error("There was a problem updating your profile!","Error");
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
        $staff = Staffs::findorfail($id);

        $staff->delete();
       
        notify()->success("Staff Trashed!","Success");

        return redirect()->back();
    }

    public function trashed()
    {
        $staff = Staffs::onlyTrashed()->get();

        return view('staffs.trashed')->with('staff',$staff);
    }

    public function restore($id)
    {
        $staff = Staffs::withTrashed()->where('id',$id)->first();

        $staff->restore();

        alert()->success('Success','Staff Restored!');

        return redirect()->back();
    }

    public function kill($id)
    {
        $staff = Staffs::withTrashed()->where('id',$id)->first();

        if($staff->photo !== 'noimage.jpg'){
            //Delete image
            Storage::delete('public/photo/'.$staff->photo);
        }

        $delete_act = $staff->forceDelete();

        if($delete_act)
        {
            $del =  DB::select("delete from users where id = '$staff->user_id'");
        }
        notify()->success("Staff permanently Deleted!","Success");

        return redirect()->back();
    }
}
