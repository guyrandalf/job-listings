<x-layout>
    <div class="">
        <form action="{{ route('user.store') }}" method="POST">
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
            <input type="text" name="name" placeholder="Fullname" value="{{ old('name') }}">
            <input type="text" name="email" placeholder="Email address" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Job location" value="{{ old('password') }}">
            <input type="password" name="password_confirmation" placeholder="Re-password"
                value="{{ old('password_confirmation') }}">
            <button type="submit">Sign up</button>
            <a href="{{ route('user.login') }}">Login</a>
        </form>
    </div>
</x-layout>
