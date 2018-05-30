@extends('admin.masterAdmin')

@section('content')
    <a href="{{ url('/customers') }}" class="btn btn-default">Go Back</a>
    <h3>{{$customer->cx_name}}</h3><hr>
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

    @if(!Auth::guest('admin'))
        @if(Auth::user()->id == $customer->admin_id)
            <a href="{{$customer->id}}/edit"  class="btn btn-default" >Edit</a>

            {!!Form::open(['action'=> ['CustomersController@destroy', $customer->id], 'method'=> 'POST', 'class'=> 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection

