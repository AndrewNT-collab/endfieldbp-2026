<?php

namespace App\Models;
use App\Models\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'category',
        'source',
        'location',
    ];

    public function producedBy()
    {
        return $this->hasOne(
            Blueprint::class,
            'result_item_id'
        );
    }
}