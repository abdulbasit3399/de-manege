<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Frontend extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'data_values' => 'object'
    ];

    public static function scopeGetContent($key)
    {
        return Frontend::where('key', $key);
    }
}
