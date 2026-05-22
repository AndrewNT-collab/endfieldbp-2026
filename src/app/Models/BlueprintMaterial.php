<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlueprintMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'blueprint_id',
        'item_id',
        'amount',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class);
    }
}