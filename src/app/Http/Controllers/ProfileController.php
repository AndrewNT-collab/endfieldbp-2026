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
        $user->uid = $request->uid;
        $user->server = $request->server;
        $user->tag1 = $request->tag1;
        $user->tag2 = $request->tag2;
        $user->tag3 = $request->tag3;

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}