<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'avatar_url',

        'name',
        'email',
        'password',

        'discord_id',
        'discord_username',
        'discord_avatar',

        'display_name',

        'uid',
        'server',

        'tag1',
        'tag2',
        'tag3',

        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        if ($this->avatar_url) {
            return asset('storage/' . $this->avatar_url);
        }

        if ($this->discord_avatar && $this->discord_id) {
            return "https://cdn.discordapp.com/avatars/{$this->discord_id}/{$this->discord_avatar}.png";
        }

        $email = $this->email ?? '';
        $hash = md5(strtolower(trim($email)));

        return "https://www.gravatar.com/avatar/{$hash}?d=mp&r=g&s=250";
    }
    
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
