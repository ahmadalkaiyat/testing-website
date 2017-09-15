@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>
<div class="row">
    <div class="col-sm-4">
        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store','files'=>true]) !!}

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
            {!! Form::select('is_for_shop', array(1=>'yes', 0=>'No'),1, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <div class="row">



        </div>

    </div>

    <div class="col-sm-8">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>to be seen</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit',$category->id)}}"> {{$category->name}}</a></td>
                        <td><img height="80" width="80" src="{{$category->photo ? "/images/".$category->photo->path : 'http://placehold.it/50x50'}}"></td>
                        <td>{{$category->is_for_shop}}</td>
                        <td>{{ $category->created_at ? $category->created_at->diffForHumans():'no date' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

</div>

    <div class="row">

        <div class="col-sm-6">
        @include('includes.form_error')
        </div>
    </div>

@stop


