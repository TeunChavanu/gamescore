<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show games</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('header')

    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $game->title }}</h1>
        <p class="mb-2"><strong>Genre:</strong> {{ $game->genre }}</p>
        <p class="mb-2"><strong>Description:</strong> {{ $game->description }}</p>
        <p class="mb-2"><strong>Release Year:</strong> {{ $game->release_year }}</p>
        <p class="mb-2"><strong>Rating:</strong> {{ trim(trim($game->rating, '0'), '.') ?? 'N/A' }}</p>
        @if($game->image)
            <div class="mt-4">
                <img src="{{ asset('storage/images/' . $game->image) }}" alt="{{ $game->title }}" class="w-full h-auto rounded-lg">
            </div>
        @endif
    </div>
    
</body>
</html>