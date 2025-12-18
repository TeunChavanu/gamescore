<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('header')
   
    <?php

    use App\Models\Game;

    $games = Game::all()->sortBy('title');
    ?>
    @if(Auth::check())


    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- GAME --}}
        <div>
            <h2 class="text-lg font-semibold mb-3">Kies een game</h2>

            <div class="grid grid-cols-3 md:grid-cols-5 gap-3">
                @foreach ($games as $game)
                <label class="cursor-pointer">
                    <input
                        type="radio"
                        name="game_id"
                        value="{{ $game->id }}"
                        class="peer hidden"
                        required>

                    <div class="border rounded-md p-1 text-center
                                peer-checked:border-blue-500
                                peer-checked:ring-2
                                peer-checked:ring-blue-400">

                        <img
                            src="{{ asset('storage/'.$game->image_url) }}"
                            class="w-full h-28 object-cover rounded">

                        <p class="mt-1 text-sm truncate">
                            {{ $game->title }}
                        </p>
                    </div>
                </label>
                @endforeach
            </div>

            @error('game_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- RATING --}}
        <div>
            <label class="block font-medium mb-1">Rating (1–10)</label>
            <input
                type="number"
                name="rating"
                min="1"
                max="10"
                value="{{ old('rating') }}"
                class="w-24 border rounded-md p-2"
                required>
            @error('rating')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- COMMENT --}}
        <div>
            <label class="block font-medium mb-1">Review</label>
            <textarea
                name="comment"
                rows="5"
                class="w-full border rounded-md p-2"
                required>{{ old('comment') }}</textarea>

            @error('comment')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Review plaatsen
        </button>
    </form>
    @else
    <h1 class="text-2xl font-semibold mx-7 mt-8 mb-4">Please log in to submit a review.</h1>
    @endif
</body>

</html>