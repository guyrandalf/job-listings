<x-layout>
    <h2>
        <a href="{{ route('listings.show', $listing->id) }}">{{ $listing->title }} </a>
    </h2>
    <x-listing-tags :tagsCsv="$listing->tags" />
    <p>
        {{ $listing->description }}
    </p>
    {{-- <x-card>
        <a href="{{ route('listings.edit', $listing->id) }}">Edit</a>
        <form action="{{ route('listings.delete', $listing->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </x-card> --}}
</x-layout>
