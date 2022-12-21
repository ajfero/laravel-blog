<!-- Title -->
<label for="title"> Title <br>
    <input name="title" type="text" value="{{ old('title', $post->title) }}">
    <br>
    @error('title')
        <small style="color: red">{{ $message }}</small>
    @enderror
</label> <br>

<!-- Body -->
<label for="body"> Body <br>
    <textarea name="body" id="" cols="30" rows="10" > {{ old('body', $post->body) }} </textarea>
    <br>
    @error('body')
        <small style="color: red">{{ $message }}</small>
    @enderror
</label> <br>