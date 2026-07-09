<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class DiscordAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function callback()
    {
        $discord = Socialite::driver('discord')->user();

        dd([
            'id' => $discord->getId(),
            'name' => $discord->getName(),
            'nickname' => $discord->getNickname(),
            'email' => $discord->getEmail(),
            'avatar' => $discord->getAvatar(),
            'raw' => $discord->user,
        ]);

        $user = User::updateOrCreate(
            [
                'discord_id' => $discord->getId(),
            ],
            [
                'discord_username' => $discord->getNickname() ?: $discord->getName(),
                'display_name'      => $discord->getNickname() ?: $discord->getName(),
                'name'              => $discord->getName(),
                'email'             => $discord->getEmail() ?? $discord->getId() . '@discord.local',
                'password'          => bcrypt(Str::random(32)),
                'discord_avatar'    => $discord->getAvatar(),
            ]
        );

        Auth::login($user, true);

        session()->regenerate();

        return redirect()->route('profile.edit');
    }
}