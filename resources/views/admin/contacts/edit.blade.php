@extends('layouts.admin')

@section('content')

    <h1>Edit Contact</h1>




    <div class="row">

        <div class="col-sm-8">

        {!! Form::model($contact, ['method'=>'PATCH', 'action'=> ['AdminContactsController@update', $contact->id], 'files'=>true]) !!}
        <!--  pay attention to the modifications we made in the upper line  open to model POST to PATCH adding $post and $post->id -->

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
                {!! Form::submit('Update Contact', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminContactsController@destroy',$contact->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Contact', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">

        .

    </div>

    <div class="row">

        @include('includes.form_error')

    </div>

@stop