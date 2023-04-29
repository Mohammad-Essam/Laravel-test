<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="preload" as="style" href="/build/assets/app-333be49a.css">
    <link rel="modulepreload" href="/build/assets/app-c47d7316.js">
    <link rel="stylesheet" href="/build/assets/app-333be49a.css">
    <script type="module" src="/build/assets/app-c47d7316.js"></script>

</head>
<body class="main-layout">
    <x-navbar />
    <main>
        {{ $slot }}
    </main>
</body>
</html>
