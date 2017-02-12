@extends('layouts.layout')
@section('content')


    <h1>{{$page->title}}</h1>

    <p>{{$page->body}}</p>

    <div class="comments">
        <ul class="list-group">
            @foreach($page->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
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

