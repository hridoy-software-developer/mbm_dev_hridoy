<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    # boot
    public static function boot() {
        parent::boot();
        self::creating(function ($item) {
            $item->created_at = date('Y-m-d h:s:i');
            $item->updated_at = date('Y-m-d h:s:i');
        });
    }
}
