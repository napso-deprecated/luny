@extends('backend.layouts.backend')
@section('content')

    <h2>{{ $role->exists ? 'Edit the role' : 'Add a role'}} </h2>

    @role('super admin')
    <form method="POST" action="{{ $role->exists ? '/admin/roles/'.$role->id : '/admin/roles'}}">
        {{ $role->exists ? method_field('PATCH') : ''}}
        {{ csrf_field() }}
        @include('backend.layouts.partial.errors')

        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="name" class="form-control" id="name" name="name" required
                   value="{{old('name') ? old('name') : $role->name}}">
        </div>

        <br/>
        <button type="submit" class="btn btn-primary">{{ $role->exists ? 'Edit' : 'Add'}}</button>
    </form>
    @endrole
@endsection

