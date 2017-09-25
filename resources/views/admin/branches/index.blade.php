@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>All Branches</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Owner</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        </thead>
        <tbody>

        @if($branches)
            @foreach($branches as $branch)
                <tr>
                    <td>{{$branch->id}}</td>
                    <td> <a href="{{route('branches.edit',$branch->id)}}" >{{$branch->user->name}} </a> </td>  <!-- to go to Edit Page-->
                    <td>{{$branch->name}}</td>
                    <td>{{str_limit($branch->address,25)."..."}}</td>
                    <td>{{$branch->phone}}</td>
                    <td>{{$branch->status ? $branch->status->name : 'branch has no Status'}}</td>
                    <td>{{$branch->latitude}}</td>
                    <td>{{$branch->longitude}}</td>
                    <td>{{$branch->created_at->diffForHumans()}}</td>
                    <td>{{$branch->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop