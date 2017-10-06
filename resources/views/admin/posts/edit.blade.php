@extends('layouts.admin')

@section('content')

    <h1>Edit  Posts</h1>




    <div class="row">

        <div class="row">

            @include('includes.form_error')

        </div>

        <div class="col-sm-4">

            <img src="{{$post->photo->path}}" alt=""  class="img-responsive">

        </div>

        <div class="col-sm-8">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        <!--  pay attention to the modifications we made in the upper line  open to model POST to PATCH adding $post and $post->id -->

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
            {!! Form::label('section_id', 'Section:') !!}
            {!! Form::select('section_id', $section, $post->section_id, ['class'=>'form-control'])!!}
            <!--  we removed some things from the upper line  -->
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
            {!! Form::select('status_id', $status, null, ['class'=>'form-control'])!!}
            <!--  we removed some things from the upper line  -->
            </div>


            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminPostsController@destroy',$post->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">

        .

    </div>



@stop