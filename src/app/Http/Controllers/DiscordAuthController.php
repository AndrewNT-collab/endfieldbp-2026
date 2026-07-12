<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class DiscordAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function callback()
    {
        $discord = Socialite::driver('discord')->user();

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

        if (empty($user->uid)) {
            $user->uid = 'EF-' . random_int(10000000, 99999999);
            $user->save();
        }

        Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);

        if ((string) $user->discord_id === env('SUPER_ADMIN_DISCORD_ID')) {
            $user->syncRoles('super_admin');
        } else {
            $user->syncRoles('user');
        }

        Auth::login($user, true);

        session()->regenerate();

        return redirect()->route('profile.edit');
    }
}