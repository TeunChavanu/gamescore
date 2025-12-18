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
    <a href="/all_games" class="text-blue-500 hover:text-blue-700 mx-7 mt-4 inline-block">&larr; Back to all games</a>

    <div class="max-w-6xl mx-auto p-6 mt-10">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <img src="{{ asset('storage/' . $game->image_url) }}"
                    alt="{{ $game->title }}"
                    class="rounded-2xl shadow-lg w-full object-cover">
            </div>

            <div class="md:col-span-2 space-y-5">

                <h1 class="text-4xl font-bold">{{ $game->title }}</h1>

                <div class="flex flex-wrap items-center gap-3">
                    <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm">
                        {{ $game->genre }}
                    </span>

                    <span class="text-gray-500 text-sm">
                        Released: <strong>{{ $game->release_year }}</strong>
                    </span>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-yellow-500 text-2xl">★</span>
                    <span class="text-lg font-semibold">
                        {{ $game->average_score ?? 'No rating yet' }}
                    </span>
                </div>

                <p class="text-gray-700 leading-relaxed text-lg">
                    {{ $game->description }}
                </p>
                @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('games.edit', $game->id) }}"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Edit Game
                </a>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        onclick="return confirm('Are you sure you want to delete this game?')">
                        Delete Game
                    </button>
                </form>
                @endif

                <div>
                    <h2 class="text-2xl font-bold mt-8 mb-4">Reviews</h2>
                    @foreach($game->reviews as $review)
                    <div class="border-b pb-4 mb-4">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="font-semibold">{{ $review->user->name }}</span>
                            <span class="text-yellow-500">★ {{ $review->rating }}</span>
                            <span class="text-gray-500 text-sm">{{ $review->created_at->format('F j, Y') }}</span>
                        </div>
                        <span class="">{{ $review->comment }}</span>
                    </div>

                    
                    @endforeach
                </div>
              
            </div>
        </div>
    </div>

</body>

</html>