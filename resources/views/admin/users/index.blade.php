@extends('layouts.admin')



@section('content')
    <h1>Users List</h1>

    <table class="table">
        <thead>
          <tr>
              <th>ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>country</th>
              <th>category</th>
              <th>Created</th>
              <th>Updated</th>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
                <td>{{$user->id}}</td>
                <td><img height="50" width="50" src="{{$user->photo ? $user->photo->path : 'http://placehold.it/50x50'}}"></td>
                <td><a href="{{route('users.edit',$user->id)}}"> {{$user->name}} </a> </td>
                <td>{{$user->email}}</td>
                <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                <td>{{$user->status ? $user->status->name : 'User has no status'}}</td>
                <td>{{$user->country ? $user->country->name : 'User has no country'}}</td>
                <td>{{$user->category ? $user->category->name : 'User has no category'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>


            @endforeach

        @endif


     </table>


@stop

