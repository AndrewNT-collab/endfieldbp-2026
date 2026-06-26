<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function blueprints()
    {
        return $this->belongsToMany(
            Blueprint::class,
            'blueprint_machine'
        );
    }
}