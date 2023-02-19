<x-layout>
    @unless($listings->isEmpty())
        @foreach ($listings as $listing)
            <p>{{ $listing->title }}</p>
            <a href="{{ route('listings.edit', $listing->id) }}">Edit</a>
            <form action="{{ route('listings.delete', $listing->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    @else
        <p>No listings found</p>
    @endunless
</x-layout>
