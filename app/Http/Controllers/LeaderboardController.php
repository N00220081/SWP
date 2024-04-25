<?php

// app/Http/Controllers/LeaderboardController.php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Retrieve all members with their related usages
        $members = Member::with('usages')->get();

        // Sort members by total usage amount in ascending order
        $sortedMembers = $members->sortBy(function ($member) {
            return $member->usages->sum('amount');
        });

        return view('leaderboard', [
            'members' => $sortedMembers,
        ]);
    }
}
