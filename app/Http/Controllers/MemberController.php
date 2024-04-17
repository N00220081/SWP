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
     
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

       Member::created([
        'profile_pic' => "https://picsum.photos/id/118/500/500",
        'name' => $request->name,
        'pressure' => "Select preferred Pressure",
        'temperature' => "Select preferred Temperature",
        'created_at' => now(),
        'updated_at' => now(),
       ]);
       return to_route('member.index');
    
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
    public function destroy(string $id)
    {
        //
    }
}