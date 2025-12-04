@foreach ($categories as $category)
    <li>
        <a href="{{ route('products.category', $category->slug) }}">
            {{ $category->name }}
        </a>
    </li>
@endforeach
