@extends('layouts.admin')



@section('content')

    <h1>Sections</h1>
    <div class="row">
        <div class="col-sm-5">
            {!! Form::open(['method'=>'POST', 'action'=> 'UserSectionsController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('status_id', 'Status:') !!}
                {!! Form::select('status_id', [''=>'Please Select a Status']+$status,1, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create Section', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            <div class="row">



            </div>

            <div>
                @include('includes.form_error')
            </div>

        </div>

        <div class="col-sm-7">

            @if($sections)

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($sections as $section)
                        <tr>
                            <td><a href="{{route('sections.edit',$section->id)}}"> {{$section->name}}</a></td>
                            <td>{{$section->Status->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>






@stop


