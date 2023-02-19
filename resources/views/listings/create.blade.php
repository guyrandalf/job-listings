<x-layout>
    <div class="">
        <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <input type="text" name="company" placeholder="Company name" value="{{ old('company') }}">
            <input type="text" name="title" placeholder="Job title" value="{{ old('title') }}">
            <input type="text" name="location" placeholder="Job location" value="{{ old('location') }}">
            <input type="text" name="email" placeholder="Contact Email" value="{{ old('email') }}">
            <input type="text" name="website" placeholder="Website/App url" value="{{ old('website') }}">
            <input type="text" name="tags" placeholder="Tags(comma separated)" value="{{ old('tags') }}">
            <input type="file" name="logo">
            <textarea name="description" placeholder="Job description" cols="30" rows="10">{{ old('description') }}</textarea>
            <button type="submit">Create job</button>
            <a href="{{ route('listings.index') }}">Back</a>
        </form>
    </div>
</x-layout>
