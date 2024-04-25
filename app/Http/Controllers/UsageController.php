<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\Member;
use Illuminate\Http\Request;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve all usages
        $usages = Usage::with('member');
    
        // Filter by member name if selected
        if ($request->filled('memberName')) {
            $usages->whereHas('member', function ($query) use ($request) {
                $query->where('id', $request->memberName);
            });
        }
    
        // Apply sorting logic for length, date, or amount (example: descending order)
        $sortColumn = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'desc');
    
        if ($sortColumn === 'length' || $sortColumn === 'date' || $sortColumn === 'amount') {
            $usages->orderBy($sortColumn, $sortDirection);
        }
    
        // Fetch all members for dropdown
        $members = Member::all();
    
        return view('usages.index', [
            'usages' => $usages->get(),
            'members' => $members,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usage = Usage::find($id);
        return view('usages.show')->with('usage', $usage);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usage $usage)
    {
        $usage->delete();
        return to_route('usage.index')->with('success', 'Usage removed Successfully');
    }
}
