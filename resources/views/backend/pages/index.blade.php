@extends('backend.layouts.backend')
@section('content')

    @include('layouts.partial.errors')

    <a href="{{ route('createPageForm') }}" class="btn btn-primary">Add Page</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>User</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>
                    <a href="{{ route('pages.show', $page->uri) }}">{{$page->title}}</a>
                </td>
                <td>{{$page->user->name}}</td>
                <td>{{$page->published ? 'Published' : 'Not Published'}}</td>
                <td>{{ $page->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $page->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('editPageForm', $page->uri) }}"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
                <td>
                    <a href="{{ route('users.confirm', $page->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $pages->render() !!}

@endsection

