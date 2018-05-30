@extends('user.masterUser')

@section('content')
    <h3>{{$user->$customer->cx_name}}</h3><hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                     <img style="width:100%" src="../storage/cx_images/{{ $customer->cx_image }}" > 
            </div> 

            <div class="col-md-6 col-sm-6">
                <p style="text-align:justify;"></p>
                <hr>

            <div><small class="pull-right"> Written on {{ $customer->created_at }} by </small></div>
       </div>
        </div>
    </div>
         
    
    
    <hr>

   
@endsection

