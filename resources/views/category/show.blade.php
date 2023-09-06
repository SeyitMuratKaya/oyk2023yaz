<h1>{{ $category->name }}</h1>
<p>
    <small>{{ $category->created_at->diffForHumans() }}</small>
</p>
<ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach
</ul>
<p>
    <a href="{{ route('posts.index', ['category_id' => $category->id]) }}">Tüm yazıları gör</a>
</p>

<a href="{{ route('categories.index') }}">Geri Dön</a>
<a href="{{ route('categories.edit', $category) }}">Düzenle</a>
<hr>
<form method="POST" action="{{ route('categories.destroy', $category) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Sil</button>
</form>
