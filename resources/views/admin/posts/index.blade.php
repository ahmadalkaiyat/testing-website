@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>All Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Section</th>
            <th>Title</th>
            <th>Body</th>
            <th>Status</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="80" width="80" src="{{$post->photo ? $post->photo->path : 'http://placehold.it/50x50'}}"></td>
                    <td> <a href="{{route('posts.edit',$post->id)}}" >{{$post->user->name}} </a> </td>  <!-- to go to Edit Page-->
                    <td>{{$post->section ? $post->section->name : 'Post has no Section'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,25)."..."}}</td>
                    <td>{{$post->status ? $post->status->name : 'Post has no Status'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop