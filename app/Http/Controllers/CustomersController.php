<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Customer;
use DB; 
use Auth;

class CustomersController extends Controller
{ 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin', ['except' => ['index', 'show']]);
        $this->middleware('auth:admin');

    }

    protected function guard()
    {
        return Auth::guard('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);
        return view('customers.index')->with('customers', $customers);
    }

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
        $this->validate($request, [
            'cx_name'=> 'required',
            'passport_number' => 'required',
            'email' => ' required|string|email|max:255|unique:customers',
            'password' => 'required',
            'father_name' => 'required',
            'phone_number' => 'required',
            'cx_home_country_addr' => 'required',
            'id_proof_number' => 'required',
            'foreign_addr' => 'required', 
            'relative_contact_number' => 'required',
            'relation' => 'required',
            'cx_image' => 'image|nullable|max:1999',
            
        ]);

        //handle File Upload 
        if($request->hasFile('cx_image'))
        {
            //Get filename with the extension
            $filenameWithExt = $request->file('cx_image')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cx_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cx_image')->storeAs('public/cx_images', $fileNameToStore );
        }
        else 
        {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $customer = new Customer;
        $customer->cx_name = $request->input('cx_name');
        $customer->passport_number = $request->input('passport_number');
        $customer->cx_image = $request->input('cx_image');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->father_name = $request->input('father_name');
        $customer->phone_number = $request->input('phone_number');
        $customer->cx_home_country_addr = $request->input('cx_home_country_addr');
        $customer->id_proof_number = $request->input('id_proof_number');
        $customer->foreign_addr = $request->input('foreign_addr');
        $customer->relative_contact_number = $request->input('relative_contact_number');
        $customer->relation = $request->input('relation');

        $customer->admin_id = auth('admin')->user()->id;
        //$customer->user_id = auth()->cx_user()->id;
        $customer->cx_image =  $fileNameToStore;
    
        $customer->save();

        return redirect('/customers')->with('success', 'Customer Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show')->with('customer', $customer);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        //Check for correct admin
        if(auth('admin')->user()->id !== $customer->admin_id){
            return redirect('/customers')->with('error', 'Unauthorized');
        }
        return view('customers.edit')->with('customer', $customer);
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
        $this->validate($request, [
            'cx_name'=> 'required',
            'passport_number' => 'required',
            'password' => 'required',
            'father_name' => 'required',
            'phone_number' => 'required',
            'cx_home_country_addr' => 'required',
            'id_proof_number' => 'required',
            'foreign_addr' => 'required',
            'relative_contact_number' => 'required',
            'relation' => 'required',
            
        ]);

        //handle File Upload 
        if($request->hasFile('cx_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cx_image')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cx_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
           $path = $request->file('cx_image')->storeAs('public/cx_images', $fileNameToStore );
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        

        //Create Customer    
        $customer = Customer::find($id);
        $customer->cx_name = $request->input('cx_name');
        $customer->passport_number = $request->input('passport_number');
        $customer->cx_image = $request->input('cx_image');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->father_name = $request->input('father_name');
        $customer->phone_number = $request->input('phone_number');
        $customer->cx_home_country_addr = $request->input('cx_home_country_addr');
        $customer->id_proof_number = $request->input('id_proof_number');
        $customer->foreign_addr = $request->input('foreign_addr');
        $customer->relative_contact_number = $request->input('relative_contact_number');
        $customer->relation = $request->input('relation');
        
        
        if($request->hasFile( 'cx_image' ))
        {
        // Storage::delete('public/cover_images/'.$post->cover_image);
            $customer->cx_image =  $fileNameToStore;
        }

        $customer->save();

        return redirect('/customers')->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        //check for the correct user
        if(auth('admin')->user()->id !== $customer->admin_id){
            return redirect('/customers')->with('error', 'Unauthorized');
        }

        if($customer->cx_image != 'noimage.jpg')
        {
            //Delete image
            Storage::delete('public/cx_images/'.$customer->cx_image);

        }
        $customer->delete();

        return redirect('/customers')->with('success', 'Customer Removed');
    }
}
