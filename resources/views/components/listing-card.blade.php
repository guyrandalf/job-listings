@props(['listing'])
<div class="">
    <div class="">
        <img style="width: 100px; height: 100px" src="{{ asset($listing->logo) }}" alt="" class="">
        <div>
            <h3 class="">
                <a href="{{ route('listings.show', $listing->id) }}">{{ $listing->title }}</a>
            </h3>
            <div class="">{{ $listing->company }}
            </div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="">
                <i class=""></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</div>
