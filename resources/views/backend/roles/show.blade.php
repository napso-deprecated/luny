@extends('backend.layouts.backend')


@section('content')

    <h1>Role details</h1>

    <p>Name: {{$role->name}}</p>
    <h3>Role Permissions: </h3>
    @foreach($role->permissions as $permission )
        <ul>
            <li>{{$permission->name}}</li>
        </ul>
    @endforeach

    <h3>Role Users: </h3>
    @foreach($role->users as $user )
        <ul>
            <li>{{$user->name}}</li>
        </ul>
    @endforeach




@endsection



@section('sidebar')
    @include('layouts.partial.sidebar')
@endsection



