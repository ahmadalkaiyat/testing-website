@extends('layouts.admin')

@section('content')

    <div class="row">

    <h1>Create Contacts</h1>

        <div class="row">

            @include('includes.form_error')

        </div>

    <div class="col-sm-10">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminContactsController@store','files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('contact_person', 'Contact Person:') !!}
            {!! Form::text('contact_person', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('registration_name', 'Registration Name:') !!}
            {!! Form::text('registration_name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('sms', 'sms Number:') !!}
            {!! Form::text('sms', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', 'Office Phone Number:') !!}
            {!! Form::text('phone_number', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('email_address', 'Office Email Address:') !!}
            {!! Form::text('email_address', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('about_shop', 'About Shop:') !!}
            {!! Form::textarea('about_shop', null, ['class'=>'form-control','rows'=>5])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Contact', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>



    </div>

@stop