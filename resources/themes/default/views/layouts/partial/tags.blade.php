<div class="form-group">
    <label for="title">Tags</label>
    <select class="form-control" id="tags" name="tags">
        @foreach($tags as $tag)
            <option value="{{$tag->name}}">{{$tag->name}}</option>
        @endforeach
    </select>
</div>
