<?php

// app/Http/Controllers/LeaderboardController.php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Usage;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Fetch all members
        $members = Member::all();

        // Return the leaderboard view with members data
        return view('leaderboard', compact('members'));
    }
}
