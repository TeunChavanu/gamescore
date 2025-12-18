<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('reviews')->get();

        $games->each(function ($game) {
            $game->average_score = $this->calculateAverageScore($game);
        });

        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'release_year' => 'required|integer',
            'rating' => 'nullable|numeric',
            'image' => 'nullable|image|max:4096',
        ]);

        // Als er een upload is
        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('games', 'public');
        }

        Game::create($data);

        return redirect()->route('games.index')
            ->with('success', 'Game aangemaakt!');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'release_year' => 'required|integer',
            'rating' => 'nullable|double',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('games', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')
            ->with('success', 'Game bijgewerkt!');
    }
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')
            ->with('success', 'Game verwijderd!');
    }

    public function home()
    {
        $games = Game::with('reviews')->get();
        $games->each(function ($game) {
            $game->average_score = $this->calculateAverageScore($game);
        });

        $top = $games->sortByDesc('average_score')->take(5);

        return view('home', ['games' => $top]);
    }

    public function allGames()
    {
        $games = Game::with('reviews')->get();
        $games->each(function ($game) {
            $game->average_score = $this->calculateAverageScore($game);
        });

        $games = $games->sortBy('title');

        return view('all_games', compact('games'));
    }

    public function show(string $id)
    {
        $game = Game::with('reviews.user')->findOrFail($id);
        $game->average_score = $this->calculateAverageScore($game);

        return view('games.show', compact('game'));
    }


    private function calculateAverageScore(Game $game): ?float
    {
        $average = $game->reviews->avg('rating');

        return $average === null
            ? null
            : round($average, 1);
    }
}
