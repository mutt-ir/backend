<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'slug'
    ];

    public static function short($url, $slug = '') {
        return self::query()->create([
            'url' => $url,
            'slug' => self::getSlug($slug)
        ]);
    }

    private static function getSlug($slug = null) {
        if($slug) return $slug;
        return Str::random(8);
    }
}
