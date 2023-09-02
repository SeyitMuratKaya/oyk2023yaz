<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->id }}</title>
</head>

<body>
    <h1>
        {{ $post->title }}
    </h1>
    Kategori:
    <a href="{{ route('categories.show', $post->category) }}">
        {{ $post->category->name }}
    </a>
    </p>

    <p>{{ $post->content }}</p>
    <p><small>{{ $post->created_at->diffForHumans() }}</small></p>
    <a href="{{ route('posts.index') }}">Geri</a>
    <a href="{{ route('posts.edit', $post) }}">Düzenle</a>
    <hr>
    <form method="POST" action="{{ route('posts.destroy', $post) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Sil</button>
    </form>
</body>

</html>
