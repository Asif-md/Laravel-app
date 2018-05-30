@extends('admin.masterAdmin')

@section('content')
        <h3>Edit Customer</h3>
        {!! Form::open(['action' => ['CustomersController@update', $customer->id],  'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
                
        <div class="form-group">
                    {{Form::label('cx_name', 'Full Name')}}
                    {{Form::text('cx_name', $customer->cx_name, ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('father_name', 'Father Name')}}
                {{Form::text('father_name', $customer->father_name, ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('passport_number', 'Passport Number')}}
                {{Form::text('passport_number', $customer->passport_number, ['class' => 'form-control', 'placeholder' => 'Passport Number'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $customer->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>

            <div class="form-group">
                {{Form::label('password', 'Password')}}
                {{Form::text('password', $customer->password, ['class' => 'form-control', 'placeholder' => 'Password'])}}
            </div>

            <div class="form-group">
                {{Form::label('phone_number', 'Phone Number')}}
                {{Form::text('phone_number', $customer->phone_number, ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
            </div>

            <div class="form-group">
                    {{Form::label('relative_contact_number', 'Alternate Number')}}
                    {{Form::text('relative_contact_number', $customer->relative_contact_number, [ 'class' => 'form-control', 'placeholder' => 'Enter Spouse or guardian number'])}}
            </div>

            <div class="form-group">
                    {{Form::label('relation', 'Relationship')}}
                    {{Form::text('relation', $customer->phone_number, [ 'class' => 'form-control', 'placeholder' => 'Relationship'])}}
            </div>

            <div class="form-group">
                    {{Form::label('id_proof_number', 'ID Card Number')}}
                    {{Form::text('id_proof_number', $customer->id_proof_number, [ 'class' => 'form-control', 'placeholder' => 'ID Card Number'])}}
            </div>
 
            <div class="form-group">
                {{Form::label('cx_home_country_addr', 'Home Country Address')}}
                {{Form::textarea('cx_home_country_addr', $customer->cx_home_country_addr, ['class' => 'form-control', 'placeholder' => 'Home Country Address'])}}
            </div>
            <div class="form-group">
                    {{Form::label('foreign_addr', 'Foreign Address')}}
                    {{Form::textarea('foreign_addr', $customer->foreign_addr, ['class' => 'form-control', 'placeholder' => 'Foreign Address'])}}
            </div>

            <div class="form-group">
                    {{Form::label('cx_image', 'Upload The Image')}}
                    {{Form::file('cx_image')}}
            </div>
                

                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}
@endsection
