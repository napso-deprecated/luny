@extends('backend.layouts.backend')
@section('content')

    @include('layouts.partial.errors')

    <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rolesPaginated as $role)
            <tr>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}">{{$role->name}}</a>
                </td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
                <td>
                    <a href="{{ route('roles.confirm', $role->id) }}"><span
                                class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    {!! $rolesPaginated->render() !!}

@endsection

