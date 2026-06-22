<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

Profile::create([
    'name' => 'Endministrator',
    'uid' => '100-000-000',
    'server' => 'Asia Server',

    'tag1' => 'Valley IV',
    'tag2' => 'AIC Active',
    'tag3' => 'Patch 1.2'
]);

class Profile extends Model
{
    //
}
