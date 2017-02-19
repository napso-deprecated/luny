@extends('backend.layouts.backend')
@section('content')


    <form method="POST" action="/admin/users/{{$user->id}}" xmlns="http://www.w3.org/1999/html">

        {{method_field('PATCH')}}

        {{ csrf_field() }}


        @include('layouts.partial.errors')


        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" required value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
        </div>


        <button type=" submit" class="btn btn-primary">Edit User</button>
    </form>




@endsection

