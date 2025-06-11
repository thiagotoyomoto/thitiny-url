<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'short_code',
        'long_url',
    ];
}
