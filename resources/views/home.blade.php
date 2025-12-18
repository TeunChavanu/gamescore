<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamescore</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    @include('header')

    <div class="bg-blue-500 text-white text-center py-8">
        <h2 class="text-2xl font-semibold">Discover and review new games</h2>
        <p class="mt-2">Browse the latest titles, read community reviews and add your opinion!</p>
        <button class="mt-4 bg-white text-blue-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition duration-300"><a href="/all_games">
                View Games
            </a></button>
    </div>
    <h1 class="text-2xl font-semibold mx-7 mt-8 mb-4">Popular games</h1>

 
    <div class="grid grid-cols-5 gap-3 mx-7 mb-8">
        @foreach ($games as $game)
        <div class="flex flex-col bg-white p-2 mb-4 rounded-lg shadow-lg w-5/6 mx-auto">
            <img class="w-36 h-48 rounded-2xl object-cover mx-auto"
                src="{{ asset('storage/' . $game->image_url) }}"
                alt="{{ $game->title }}">

            <h1 class="text-lg font-bold truncate mt-2">{{ $game->title }}</h1>

            <p class=" text-gray-600 truncate w-fill">{{ $game->genre }}</p>

            <div class="flex items-center text-yellow-500 justify-between mt-1">
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="gold">
                        <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                    </svg>
                    <span>{{ $game->average_score !== null ? trim(trim($game->average_score, '0'), '.') : 'N/A' }}</span>
                </div>
                <a class="text-blue-500 hover:text-blue-700" href="/games/{{ $game->id }}">View</a>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>