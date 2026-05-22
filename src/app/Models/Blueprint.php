<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_item_id',
        'machine_id',
        'craft_time',
    ];

    public function resultItem()
    {
        return $this->belongsTo(Item::class, 'result_item_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function materials()
    {
        return $this->hasMany(BlueprintMaterial::class);
    }
}