<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $members = Member::all();
        return view('members.index')->with('members', $members);
    }

    public function create()
    {
        return view('members.create');
    }

 
    public function store(Request $request)
    {
        // Validate incoming form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pressure' => 'required|string|max:255', // Adjust max length as per your database schema
            'temperature' => 'required|string|max:255', // Adjust max length as per your database schema
            'timer' => 'required|string|max:255', // Adjust max length as per your database schema
        ]);
    
        try {
            // Create a new member instance with mass assignment
            $member = Member::create([
                'name' => $validatedData['name'],
                'profile_pic' => "https://picsum.photos/id/118/500/500",
                'pressure' => $validatedData['pressure'],
                'temperature' => $validatedData['temperature'],
                'timer' => $validatedData['timer'],
            ]);
    
            // Redirect to the member index page upon successful creation
            return redirect()->route('member.index')->with('success', 'Member created successfully!');
        } catch (\Exception $e) {
            // Handle any database insertion errors
            return back()->withInput()->withErrors(['error' => 'Failed to create member. Please try again.']);
        }
    }


  
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $member->update([
        'profile_pic' => $request->profile_pic,
        'name' => $request->name,
        'pressure' => $request->pressure,
        'temperature' => $request->temperature,
        'timer' => $request->timer,
        ]);

        return to_route('members.show', $member)->with('success', 'Member successfully Updated!');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return to_route('member.index')->with('success', 'Member removed Successfully');
    }
}