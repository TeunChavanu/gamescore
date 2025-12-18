<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }
    
   public function store(Request $request)
    {
        $validated = $request->validate([
        'game_id' => 'required|exists:games,id',
        'rating'  => 'required|integer|min:1|max:10',
        'comment' => 'required|string',
    ]);

    Review::create([
        'game_id' => $validated['game_id'],
        'user_id' => Auth::id(),
        'rating'  => $validated['rating'],
        'comment' => $validated['comment'],
    ]);

    return redirect()
        ->route('home')
        ->with('success', 'Review succesvol geplaatst!');
    }
}
