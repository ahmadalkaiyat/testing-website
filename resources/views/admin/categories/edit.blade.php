@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>
    <div class="row">

        <div class="col-sm-6">

            {!! Form::model($category,['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update',$category->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Post Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('is_for_shop', 'Shop Related:') !!}
                {!! Form::select('is_for_shop', array(1=>'yes', 0=>'No'),null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminCategoriesController@destroy',$category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            <div class="row">



            </div>

            <div>
                @include('includes.form_error')
            </div>

        </div>
        <div class="col-sm-4">

            <img src="{{$category->photo->path}}" alt=""  class="img-responsive">

        </div>

    </div>


@stop


