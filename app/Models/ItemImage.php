<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    //
    protected $fillable = [
        'item_id', 'key','url'
    ];
}
