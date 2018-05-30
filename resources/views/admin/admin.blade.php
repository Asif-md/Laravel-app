
@extends('admin.masterAdmin')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Customer</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a class="btn btn-primary" href="{{ url('/customers/create')}}"><i class="fa fa-plus " aria-hidden="true"> Create Customer</i></a> 
                <hr>
                    @if(count($customers) > 0)
                        
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>

                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->cx_name}}</td>
                                        <td> <!--<img class="img-responsive" style="width:20%; height:50px;" src="storage/cover_images/{{$customer->cx_image}}"> --></td>
                                        
                                         
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="customers/{{$customer->id}}/edit" class="btn btn-default">Edit</a>

                                            {!!Form::open(['action'=> ['PostsController@destroy', $customer->id], 'method'=> 'POST', 'class'=> 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        
                        
                        
                        @else
                            <p>You have no customers</p>
                    @endif

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
