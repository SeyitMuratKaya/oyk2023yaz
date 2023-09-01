<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label for="postTitle">Title</label>
        <br>
        <input type="text" name="title" id="postTitle" value={{ $errors->any() ? old('title') : $post->title }}>
        <br>
        <label for="postContent">Content</label>
        <br>
        <textarea name="content" id="postContent" cols="30" rows="10">{{ $errors->any() ? old('content') : $post->content }}</textarea>
        <br>
        <a href="{{ route('posts.show', $post) }}">Geri</a>
        <button type="submit">Güncelle</button>
    </form>
</body>

</html>
