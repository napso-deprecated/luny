@extends('backend.layouts.backend')
@section('content')



    <form method="POST" action="/admin/users">

        {{ csrf_field() }}


        @include('layouts.partial.errors')


        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>


        <button type="submit" class="btn btn-primary">Add User</button>
    </form>




@endsection

