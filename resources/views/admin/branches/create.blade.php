@extends('layouts.admin')

@section('content')

    <h1>Create Branch</h1>

    <div class="col-sm-10">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminBranchesController@store','files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('name', 'Branch Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::textarea('address', null, ['class'=>'form-control','rows'=>3])!!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone:') !!}
            {!! Form::text('phone', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status_id', 'Status:') !!}
            {!! Form::select('status_id', [''=>'Please Select a Status']+$status,1, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('latitude', 'latitude:') !!}
            {!! Form::text('latitude', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('longitude', 'longitude:') !!}
            {!! Form::text('longitude', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
        <a  target="_blank" href="https://www.latlong.net/">You Can get Branch Location Info longitude/longitude from here </a>
        </div>

        <div class="form-group">
            {!! Form::submit('Create Branch', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        </div>

    <div class="row">

        @include('includes.form_error')

    </div>

@stop