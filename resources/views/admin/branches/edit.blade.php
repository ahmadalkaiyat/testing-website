@extends('layouts.admin')

@section('content')

    <h1>Edit Branches</h1>




    <div class="row">


        <div class="col-sm-8">

        {!! Form::model($branch, ['method'=>'PATCH', 'action'=> ['AdminBranchesController@update', $branch->id], 'files'=>true]) !!}
        <!--  pay attention to the modifications we made in the upper line  open to model POST to PATCH adding $post and $post->id -->

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
                {!! Form::select('status_id', $status, null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('latitude', 'latitude:') !!}
                {!! Form::text('latitude', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('longitude', 'longitude:') !!}
                {!! Form::text('longitude', null, ['class'=>'form-control'])!!}
            </div>

     <div class="form-group">       <a  target="_blank" href="https://www.latlong.net/">You Can get Branch Location Info longitude/longitude from here </a></div>


            <div class="form-group">
                {!! Form::submit('Update Branch', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminBranchesController@destroy',$branch->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Branch', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    <div class="row">

        @include('includes.form_error')

    </div>

@stop