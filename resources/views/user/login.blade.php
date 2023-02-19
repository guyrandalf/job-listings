<x-layout>
    <div class="">
        <form action="{{ route('user.loginUser') }}" method="POST">
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
            <input type="text" name="email" placeholder="Email address" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
            <button type="submit">Sign in</button>
            <a href="{{ route('user.register') }}">Register</a>
        </form>
    </div>
</x-layout>
