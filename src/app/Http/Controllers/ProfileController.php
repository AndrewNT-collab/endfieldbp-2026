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
        session([
            'username' => $request->username,
            'uid' => $request->uid,
            'server' => $request->server,
            'tag1' => $request->tag1,
            'tag2' => $request->tag2,
            'tag3' => $request->tag3,
        ]);

        return redirect('/')
            ->with('success', 'Profile updated.');
    }
}