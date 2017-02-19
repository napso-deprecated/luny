@extends('layouts.layout')
@section('content')


    <h1>{{$page->title}}</h1>

    <p>{{$page->body}}</p>
    @foreach($page->tags as $tag)
        <a href="/page/{{$tag->slug}}" class="tag">{{$tag->name}}</a>
    @endforeach

    <div class="markdown">
        @foreach($page->comments as $comment)
{{--            {!! $comment->body !!}--}}
            {!! Markdown::convertToHtml(e($comment->body))!!}
        @endforeach
    </div>

    {{--add a comment --}}
    <div class="card">

        @include('layouts.partial.errors')

        <form method="POST" action="/pages/{{$page->id}}/comments">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" placeholder="your comment here.." cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>


@endsection



@section('sidebar')
    @include('layouts.partial.sidebar')
@endsection


@section('scripts')
    <script>
        (function () {

            $(document).ready(function () {
                new SimpleMDE().render();
            });


        })();
    </script>
@endsection

