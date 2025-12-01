<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('header')

    @if(auth()->check() && auth()->user()->role === 'admin')

    <div class="max-w-xl mx-auto p-6 space-y-4">

        <h1 class="text-2xl font-bold mb-4">New Game</h1>

        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <input type="text" name="title" placeholder="Title" class="w-full border p-2 rounded">

            <input type="text" name="genre" placeholder="Genre" class="w-full border p-2 rounded">

            <textarea name="description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

            <input type="number" name="release_year" placeholder="Year" class="w-full border p-2 rounded">

            <input type="double" name="rating" placeholder="Rating (optional)" class="w-full border p-2 rounded">

            <div>
                <label class="block mb-1">Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>

    </div>
    @else
    <h1>No access</h1>
    @endif
</body>

</html>