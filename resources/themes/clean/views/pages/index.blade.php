@extends('layouts.layout')
@section('content')

    @role('admin')
    <a href="{{route('createPageForm')}}" class="btn btn-primary">Add new Page</a>
    @endrole

    @foreach($pages as $page)
        <div class="page">
            <h1 class="page__header">
                <a href="/pages/{{$page->uri}}">
                    {{$page->title}}
                </a>
            </h1>
            @role('admin')
            <small><a href="{{ route('editPageForm', $page->uri) }}">Edit</a></small>
            @endrole()
            <div class="page__author">
                <a href="">{{$page->user->name}}</a>
                <span class="page__time">
                    {{ $page->created_at->toFormattedDateString() }}
                </span>
            </div>

            <div class="page__preview">
                {!! str_limit(Markdown::convertToHtml($page->body), 1000)!!}
            </div>

        </div>
    @endforeach


    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>


@endsection

@section('sidebar')
    @include('layouts.partial.sidebar')
@endsection
