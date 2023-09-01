<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeni Post Ekle</title>
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <label for="postTitle">Title</label>
        <br>
        <input type="text" name="title" id="postTitle" value={{ old('title') }}>
        <br>
        <label for="postContent">Content</label>
        <br>
        <textarea name="content" id="postContent" cols="30" rows="10">{{ old('content') }}</textarea>
        <br>
        <a href="{{ route('posts.index') }}">Geri</a>
        <button type="submit">Gönder</button>
    </form>
</body>

</html>
