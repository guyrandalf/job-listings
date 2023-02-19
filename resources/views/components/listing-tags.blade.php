@props(['tagsCsv'])
@php
    $tags = explode(',', $tagsCsv);
@endphp
<ul class="">
    @foreach ($tags as $tag)
        <li class="">
            <a href="{{ route('listings.index') }}/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
