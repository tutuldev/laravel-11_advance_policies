<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'price',
        'user_id',

    ];

public function user()
{
    return $this->belongsTo(User::class); 
}

}
