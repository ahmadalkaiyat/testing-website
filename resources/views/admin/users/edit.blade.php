@extends('layouts.admin')



@section('content')
    <div class="row">

        <h1>Edit User</h1>

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->path :'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

        </div>


        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUserController@update',$user->id],'files'=>true]) !!}


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
                {!! Form::select('role_id', $roles,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('status_id', 'Status:') !!}
                {!! Form::select('status_id', $status,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'category:') !!}
                {!! Form::select('category_id', $category,null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('country_id', 'Country:') !!}
                {!! Form::select('country_id', $country,null, ['class'=>'form-control'])!!}
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
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminUserController@destroy',$user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>


    <div class="row">
        @include('includes.form_error')
    </div>




@stop

