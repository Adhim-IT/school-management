<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'School Management' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">
    @include('components.partials.navbar')
    <div class="p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            {{ $slot ?? '' }}
        </div>
    </div>
    @livewireScripts
</body>

</html>