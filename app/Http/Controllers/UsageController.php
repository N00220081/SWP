<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usages = Usage::with('member')->get();

        return view('usages.index', compact('usages'));
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
