@extends('layouts.layout')

@section('image-header')
    <div class="image-header">
        <img src="{{asset('img/hero.jpeg')}}" alt="" class="image-header__image"/>
    </div>
@endsection
@section('content')

    <article class="article">
        <div class="author">
            <img src="http://images.performgroup.com/di/library/GOAL/f6/8a/new-juventus-logo_ltar5e1hf5s612hr3iniq3831.png?t=-1457843599&w=620&h=430"
                 alt="Adam Napso" class="author_image"/>
            <div class="author__details">
                <a href="#" class="author__name">Adam Napso</a>
                <div class="author__post-time">
                    5 days ago
                </div>
            </div>
        </div>
        <h1 class="article__header">{{$page->title}}</h1>
        <h2 class="article__subheader">This is a subheader of the article page bla and blo</h2>

        <div class="article__body">
            {!! Markdown::convertToHtml(e($page->body))!!}
        </div>

    </article>



    @foreach($page->tags as $tag)
        <a href="/page/{{$tag->slug}}" class="tag">{{$tag->name}}</a>
    @endforeach

    <div class="markdown">
        @foreach($page->comments as $comment)

            <small><a href="#">{{$comment->user->name}}</a></small>

            <p>{!! Markdown::convertToHtml(e($comment->body))!!}</p>
            <hr/>
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



