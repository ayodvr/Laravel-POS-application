<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Staffs;
use App\User;
use App\AdminProfile;
use App\Customers;
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
        // $staffs = Staffs::orderBy('id','asc')->get();
        // return view('staffs.index')->with('staffs',$staffs);

        // $recs = array();
         //$users = DB::table("users")->select("id","name","email","usertype")->get();
        // array_push($recs,$users);
        // $staffs = DB::table("staffs")->select("user_id","photo","phone","department","experience")->get();
        // array_push($recs,$staffs);
        // dd($recs);
        // return view('staffs.index')->with('recs',$recs);

        // $users = DB::table("users")->select("id","name","email","usertype")->get();
        // $staffs = DB::table("staffs")->select("user_id","photo","phone","department","experience")->get();
        // $merged = $users->merge($staffs);
        // $recs = $merged->all();
        // dd($recs);
        // return view('staffs.index')->with('recs',$recs);

        $recs = array();
        $staff_rec_arr = array();
        $users = DB::table("users")->select("id","name","email","status","usertype")->get();
        foreach ($users as $user){
            if($user->usertype == "Admin") continue;
            $staff_rec = Staffs::where("user_id","=",$user->id)->get();

            if(!empty($staff_rec[0])){
                $staff_rec_arr["user_id"]    =  $user->id;
                $staff_rec_arr["id"]         =  $staff_rec[0]->id;
                $staff_rec_arr["photo"]      =  $staff_rec[0]->photo;
                $staff_rec_arr["phone"]      =  $staff_rec[0]->phone;
                $staff_rec_arr["name"]       =  $user->name;
                $staff_rec_arr["email"]      =  $user->email;
                $staff_rec_arr["status"]     =  $user->status;
                $staff_rec_arr["usertype"]   =  $user->usertype;
                $staff_rec_arr["department"] =  $staff_rec[0]->department;
                array_push($recs,$staff_rec_arr);

            }else{
                $staff_rec_arr["user_id"]    =  $user->id;
                $staff_rec_arr["photo"]      =  "";
                $staff_rec_arr["id"]         =  "";
                $staff_rec_arr["name"]       =  $user->name;
                $staff_rec_arr["email"]      =  $user->email;
                $staff_rec_arr["status"]      = $user->status;
                $staff_rec_arr["usertype"]   =  $user->usertype;
                $staff_rec_arr["phone"]      =  "";
                $staff_rec_arr["department"] =  "";
                array_push($recs,$staff_rec_arr);
            }


        }
                //dd($recs);
            //  $data = $this->paginate($recs);

            return view('staffs.index')->with('recs',$recs);



    }

    // public function paginate($items, $perPage = 3, $page = null, $options = [])
    // {
    //     $pageName = 'page';
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     //dd($page);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     //dd($items);
    //     return new LengthAwarePaginator(
    //         $items->forPage($page, $perPage)->values(),
    //         $items->count(),
    //         $perPage,
    //         $page,
    //         [
    //             'path'     => Paginator::resolveCurrentPath(),
    //             'pageName' => $pageName,
    //         ]
    //     );

    // }

    public function changeStatus(Request $request, $id)
    {
        $rec = User::find($request->id);

        if ($rec->status == 0) {
            # code...
            $rec->status=1;
        }else{
            $rec->status=0;
        }
       if($rec->save()){

        notify()->info(" Status has been changed successfully!","Success!");

       }

        return redirect()->back();
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
       //dd($staff);

         return view('staffs.show')->with('staff',$staff);

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
        $user = User::findorfail($id);

        $user->delete();

        notify()->success("User Deleted!","Success");

        return redirect()->back();
    }

    // public function trashed()
    // {
    //     $staff = Staffs::onlyTrashed()->get();

    //     return view('staffs.trashed')->with('staff',$staff);
    // }

    // public function restore($id)
    // {
    //     $staff = Staffs::withTrashed()->where('id',$id)->first();

    //     $staff->restore();

    //     alert()->success('Success','Staff Restored!');

    //     return redirect()->back();
    // }

    public function kill($id)
    {
        // $staff = Staffs::withTrashed()->where('id',$id)->first();

        // if($staff->photo !== 'noimage.jpg'){
        //     //Delete image
        //     Storage::delete('public/photo/'.$staff->photo);
        // }

        // $delete_act = $staff->forceDelete();

        // $staff = Staffs::findorfail($id);

        // $delete_act = $staff->delete();

        // if($delete_act)
        // {
        //     $del =  DB::select("delete from users where id = '$staff->user_id'");
        // }


        $user = User::findorfail($id);

        $delete_act = $user->delete();

        if($delete_act)
        {
            $del =  DB::select("delete from staffs where user_id = '$user->id'");
        }
        notify()->success("Staff Deleted!","Success");

        return redirect()->back();
    }
}
