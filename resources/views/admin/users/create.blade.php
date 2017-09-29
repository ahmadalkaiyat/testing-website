@extends('layouts.admin')



@section('content')
    <div class="row">

        <h1>Create User</h1>

        <div class="row">
            @include('includes.form_error')
        </div>

        <div class="col-sm-10">

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminUserController@store','files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=>'Please Select a Role']+$roles,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('status_id', 'Status:') !!}
                {!! Form::select('status_id', [''=>'Please Select a Status']+$status,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'category:') !!}
                {!! Form::select('category_id', [''=>'Please Select a Category']+$category,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('country_id', 'Country:') !!}
                {!! Form::select('country_id', [''=>'Please Select a Country']+$country,114, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'User Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create User', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>




@stop

