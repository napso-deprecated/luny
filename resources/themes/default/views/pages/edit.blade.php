@extends('layouts.layout')
@section('content')


    <h1>Edit a Page</h1>



    <form method="POST" action="/pages/{{$page->uri}}">

        {{ csrf_field() }}


        @include('layouts.partial.errors')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{old('title') ? old('title') : $page->title}}">
        </div>

        <div class="form-group">
            <label for="title">Published:</label>
            <select class="form-control" id="published"  name="published">
                <option value="1" {{$page->published ? "selected" : ""}}>Yes</option>
                <option value="0" {{!$page->published ? "selected" : ""}}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="uri">URI:</label>
            <input type="text" class="form-control" id="uri" name="uri" required value="{{old('uri') ? old('uri') : $page->uri}}">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body') ? old('body') : $page->body}}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>



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



@section('sidebar')
    @include('layouts.partial.sidebar')
@endsection

