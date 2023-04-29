@props(
    [
        'title'=> env('APP_NAME','Guest')
    ]
)

<!DOCTYPE html>
<html data-theme="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="preload" as="style" href="/build/assets/app-333be49a.css">
    <link rel="modulepreload" href="/build/assets/app-c47d7316.js">
    <link rel="stylesheet" href="/build/assets/app-333be49a.css">
    <script type="module" src="/build/assets/app-c47d7316.js"></script>

</head>
<body>
    <main class="guest">
        <h3 style="text-shadow: 0 0 10px rgb(141, 130, 238) ;color: white;font-size: 3rem;margin:0">Contro<span style="font-size: 3.5rem;color: rgb(91, 183, 236)">Way</span></h3>

    @isset($errors)

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $value )
            <li>{{ $value }}</li>
            @endforeach
        </ul>
    @endif

    @endisset

    {{ $slot }}
    </main>
</body>
</html>
