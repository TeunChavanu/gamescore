<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function promote(User $user)
    {
        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('status', $user->name . ' is now an admin.');
    }
}
