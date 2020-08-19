<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminProfile;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth()->user()->usertype == 'User'){

            return redirect('/staff_dashboard');
        }
        elseif(Auth()->user()->usertype == 'Admin')
        {
            return redirect('/dashboard');
        }
        
    }
    
}
