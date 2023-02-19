@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="position: fixed; top: 0">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
