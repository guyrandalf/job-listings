<x-layout>
    <div class="">
        <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="" style="color: red">
                @if ($errors->any())
                    <div class="">
                        An error occured...
                    </div>
                    <ul class="">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <img style="width: 100px; height: 100px"
                src="{{ $listing->logo ? asset('/public/images/' . $listing->logo) : asset('/public/images/no-image.jpg') }}"
                alt="" class="">
            <input type="text" name="company" placeholder="Company name" value="{{ $listing->company }}">
            <input type="text" name="title" placeholder="Job title" value="{{ $listing->title }}">
            <input type="text" name="location" placeholder="Job location" value="{{ $listing->location }}">
            <input type="text" name="email" placeholder="Contact Email" value="{{ $listing->email }}">
            <input type="text" name="website" placeholder="Website/App url" value="{{ $listing->website }}">
            <input type="text" name="tags" placeholder="Tags(comma separated)" value="{{ $listing->tags }}">
            <input type="file" name="logo">
            <textarea name="description" placeholder="Job description" cols="30" rows="10">{{ $listing->description }}</textarea>
            <button type="submit">Update job</button>
            <a href="{{ URL::previous() }}">Back</a>
        </form>
    </div>
</x-layout>
