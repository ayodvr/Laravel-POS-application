<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use App\Mail\UserMail;
use Mail;
use Illuminate\Support\Str;
use Crypt;

class NewUserController extends Controller
{


    public function user_store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'usertype' => ['string', 'max:255']

        ]);

        $password = Str::random(6);

        $data = [
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> Hash::make($password),
            'usertype'=> $request->get('usertype')
        ];

            if(User::create($data)){

                $email = $data['email'];
                $details = [
                    'name' => $data['name'],
                    'email'=> $data['email'],
                    'password' => $password
                ];

                //dd($details['password']);
                Mail::to($email)->send(new UserMail($details));

                return response()->json(['success_info'=>'<h6>You have succesfully registered a new user!</h6>']);

            }

    }
}
