<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $avatar = session('avatar');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')
                ->store('avatars', 'public');
        }

        session([
            'avatar' => $avatar,
            'username' => $request->username,
            'uid' => $request->uid,
            'server' => $request->server,
            'tag1' => $request->tag1,
            'tag2' => $request->tag2,
            'tag3' => $request->tag3,
        ]);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated.');
    }
}