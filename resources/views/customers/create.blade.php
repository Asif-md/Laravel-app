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
        
            {!! Form::open(['action' => 'CustomersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'      ]) !!}
            <div class="form-group">
                    {{Form::label('cx_name', 'Full Name')}}
                    {{Form::text('cx_name', '', ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('father_name', 'Father Name')}}
                {{Form::text('father_name', '', ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('passport_number', 'Passport Number')}}
                {{Form::text('passport_number', '', ['class' => 'form-control', 'placeholder' => 'Passport Number'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>

            <div class="form-group">
                {{Form::label('password', 'Password')}}
                {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => "Create User's Password"])}}
            </div>

            <div class="form-group">
                {{Form::label('phone_number', 'Phone Number')}}
                {{Form::text('phone_number', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
            </div>

            <div class="form-group">
                    {{Form::label('relative_contact_number', 'Alternate Number')}}
                    {{Form::text('relative_contact_number', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Spouse or guardian number'])}}
            </div>

            <div class="form-group">
                    {{Form::label('relation', 'Relationship')}}
                    {{Form::text('relation', '', [ 'class' => 'form-control', 'placeholder' => 'Relationship'])}}
            </div>

            <div class="form-group">
                    {{Form::label('id_proof_number', 'ID Card Number')}}
                    {{Form::text('id_proof_number', '', [ 'class' => 'form-control', 'placeholder' => 'ID Card Number'])}}
            </div>
 
            <div class="form-group">
                {{Form::label('cx_home_country_addr', 'Home Country Address')}}
                {{Form::textarea('cx_home_country_addr', '', ['class' => 'form-control', 'placeholder' => 'Home Country Address'])}}
            </div>
            <div class="form-group">
                    {{Form::label('foreign_addr', 'Foreign Address')}}
                    {{Form::textarea('foreign_addr', '', ['class' => 'form-control', 'placeholder' => 'Foreign Address'])}}
            </div>

            <div class="form-group">
                    {{Form::label('cx_image', 'Upload The Image')}}
                    {{Form::file('cx_image')}}
            </div>

                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

                    <a class="btn btn-danger" href="{{ url('/admin.dashboard')}}">Cancel</a>
 
        {!! Form::close() !!}


            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->


</div><!-- /.row -->
@endsection