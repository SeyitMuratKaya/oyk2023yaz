<h1>Categories</h1>
<p>
    <a href="{{ route('categories.create') }}">Yeni Kategori Ekle</a>
</p>
<br>
<ul>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>
