@extends('layouts.admin')



@section('content')

    <h1>Edit Sections</h1>

    <div class="row">

    <div class="col-sm-6">
        {!! Form::model($section, ['method'=>'PATCH', 'action'=> ['UserSectionsController@update', $section->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('update Section', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=> ['UserSectionsController@destroy',$section->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Section', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>
    </div>
    <div class="col-sm-6">

        @include('includes.form_error')

    </div>

    <div class="col-sm-6">




    </div>




@stop


