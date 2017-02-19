@extends('layouts.layout')
@section('content')

    <a href="{{route('createPageForm')}}" class="btn btn-primary">Add new Page</a>

    @foreach($pages as $page)
        <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="/pages/{{$page->id}}">
                    {{$page->title}}
                </a>
            </h2>

            <p class="blog-post-meta">{{$page->user->name}} {{ $page->created_at->toFormattedDateString() }}</p>
            {{$page->body}}

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
