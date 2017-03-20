@extends('layouts.layout')
@section('content')


    <h1>Add a new Tag</h1>



    <form method="POST" action="/tags">

        {{ csrf_field() }}


        @include('layouts.partial.errors')


        <div class="form-group">
            <label for="uri">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="title">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
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

