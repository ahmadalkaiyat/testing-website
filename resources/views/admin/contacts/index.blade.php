@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>All Contacts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Owner</th>
            <th>Contact Person</th>
            <th>Registration Name</th>
            <th>SMS number</th>
            <th>Office Phone Number</th>
            <th>Office Email Address</th>
            <th>About Shop</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>

        @if($contacts)
            @foreach($contacts as $contact)
                <tr>
                    <td> <a href="{{route('contacts.edit',$contact->id)}}" >{{$contact->user->name}} </a> </td>  <!-- to go to Edit Page-->
                    <td>{{$contact->contact_person}}</td>
                    <td>{{$contact->registration_name}}</td>
                    <td>{{$contact->sms}}</td>
                    <td>{{$contact->phone_number}}</td>
                    <td>{{$contact->email_address}}</td>
                    <td>{{str_limit($contact->about_shop,25)."..."}}</td>
                    <td>{{$contact->created_at->diffForHumans()}}</td>
                    <td>{{$contact->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop