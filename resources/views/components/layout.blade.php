<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RandiJobs</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <nav>
        <div class="brand-title">
            <a href="{{ route('listings.index') }}">RandiJobs</a>
        </div>
        <ul>
            @auth
                <li> Welcome {{ auth()->user()->name }} </li>
                <li><a href="{{ route('user.listings') }}">Manage Jobs </a></li>
                <li>
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                <li><a href="{{ route('listings.create') }}">Add Job</a></li>
            @else
                <li> <a href="{{ route('user.register') }}">Create account</a></li>
                <li><a href="{{ route('user.login') }}">Login </a></li>
            @endauth
        </ul>
        @include('partials._search')
    </nav>
    {{-- VIEW CONTENT --}}
    <main>
        {{ $slot }}
    </main>
    <footer>
        Copyright &copy; Randisoft Jobs 2022. All rights reserved
    </footer>
    <x-flash-message />
</body>

</html>
