<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class NewUserController extends Controller
{
    
    // public function create(){

    //     return view('/register_2');
    // }

    public function user_store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'max:255'],

        ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->usertype = $request->usertype;

            if($user->save()){
                
                return response()->json(['success_info'=>'<h6>You have succesfully registered a new user!</h6>']);

            }
            
    }
}
