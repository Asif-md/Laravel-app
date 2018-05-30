<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB; 
use App\User;

class UserController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       return view('user.index');
    }
   
    public function profile($id)
    {   
        $user = User::where('id', $id)->firstOrfail();
        return view('user.profile')->with('user', $user);
    }


    public function showDetails()
    { 

       
        //$customers = Customer::orderBy('created_at', 'desc')->paginate(10);
        return view('user.showDetails');
        
        //return view('customers.show')->with('customer', $customer);
    
}


}
