<x-layout>
    <div class="">
        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No Listings Found</p>
        @endunless
    </div>
    <div>
        {{ $listings->links() }}
    </div>
</x-layout>
