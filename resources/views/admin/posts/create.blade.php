@extends('layouts.admin')

@section('content')

    <h1>create Posts</h1>

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store','files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('section_id', 'Section:') !!}
            {!! Form::select('section_id',[''=>'Please Select a Category']+$section, null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Post Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>5])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status_id', 'Status:') !!}
            {!! Form::select('status_id', [''=>'Please Select a Status']+$status,1, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="row">

        @include('includes.form_error')

    </div>

@stop