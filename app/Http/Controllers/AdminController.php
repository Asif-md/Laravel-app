<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admin_id = auth('admin')->user()->id;
       $admin = Admin::find($admin_id);
       return view('admin.admin')->with('customers', $admin->customers);
      // return view('admin');
    }
}
