<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'display_name' => 'required|max:255',
            'uid' => 'nullable|max:255',
            'server' => 'nullable|max:255',
            'tag1' => 'nullable|max:255',
            'tag2' => 'nullable|max:255',
            'tag3' => 'nullable|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $user->avatar_url = $request->file('avatar')
                ->store('avatars', 'public');
        }

        $user->display_name = $request->display_name;
        $user->server = $request->input('server');
        $user->tag1 = $request->input('tag1');
        $user->tag2 = $request->input('tag2');
        $user->tag3 = $request->input('tag3');
        $user->bio = $request->input('bio');

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}