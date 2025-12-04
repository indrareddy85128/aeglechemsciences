<ul>
    @foreach ($socialmedias as $socialmedia)
        <li><a href="{{ $socialmedia->link }}" title="{{ $socialmedia->name }}">{!! $socialmedia->icon !!}</a></li>
    @endforeach
</ul>
