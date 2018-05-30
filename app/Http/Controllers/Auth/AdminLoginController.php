<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;



class AdminLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest', ['except' => ['logout']]);
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Attempt op log user in
       
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        //unsuccessful, redirect to login page
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
 