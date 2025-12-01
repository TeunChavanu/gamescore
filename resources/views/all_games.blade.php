<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game catalog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    @include('header')

    <h1 class="text-2xl font-semibold mx-7 mt-8 mb-4">All games</h1>

    <?php
    use App\Models\Game;

    $games = Game::all()->sortBy('title');
    ?>
    <div class="grid grid-cols-5 gap-3 mx-7 mb-8">
        @foreach ($games as $game)
        <div class="flex flex-col bg-white mx-7 p-2 mb-4 rounded-lg shadow-lg">
            <img class="w-40 h-50 rounded-2xl object-cover mx-auto" src="{{ asset('storage/' . $game->image_url) }}" alt="Logo">
            <h1 class="text-xl font-bold">{{ $game->title }}</h1>
            <p class="flex grow">{{ $game->genre }}</p>  
            <div class="flex items-center text-yellow-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg"  
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="gold">
                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                </svg>
                {{ trim(trim($game->rating, '0'), '.') ?? 'N/A' }}
                <a class="text-blue-500 ml-33 hover:text-blue-700" href="/games/{{ $game->id }}">View</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>