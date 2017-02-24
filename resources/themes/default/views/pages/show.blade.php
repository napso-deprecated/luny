@extends('layouts.layout')
@section('content')


    <h1>{{$page->title}}</h1>

    {!! Markdown::convertToHtml(e($page->body))!!}

    @foreach($page->tags as $tag)
        <a href="/page/{{$tag->slug}}" class="tag">{{$tag->name}}</a>
    @endforeach

    <div class="markdown">
        @foreach($page->comments as $comment)
            {{--            {!! $comment->body !!}--}}
            <h2>{!! Markdown::convertToHtml(e($comment->body))!!}</h2>
            From:<small>{{$comment->user->name}}</small>
        @endforeach
    </div>


    @if (Auth::guest())
        <p>Please Login to write a Comment...</p>
    @else
        <div class="card">
            @include('layouts.partial.errors')
            <form method="POST" action="/pages/{{$page->uri}}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="your comment here.." cols="10" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    @endif




@endsection



@section('sidebar')
    @include('layouts.partial.sidebar')
@endsection



