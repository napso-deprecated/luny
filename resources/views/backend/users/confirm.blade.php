@extends('backend.layouts.backend')
@section('content')



    <form method="POST" action="/admin/users/{{$user->id}}" xmlns="http://www.w3.org/1999/html">

        {{ csrf_field() }}

        {{method_field('DELETE')}}
        <button type=" submit" class="btn btn-primary">Confirm to Delete user</button>
    </form>

@endsection

