<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'slug'
    ];


    /**
     * @throws \Exception
     */
    public function scopeFirstBySlug($query, $slug) {
        try {
            return $query->where('slug', $slug)->first();
        } catch(\Exception $exception) {
            throw new \Exception($exception);
        }
    }

    public static function short($url, $slug = '') {
        return self::query()->create([
            'url' => $url,
            'slug' => self::getSlug($slug)
        ]);
    }
    public static function getSlug($slug = null) {
        if($slug) return $slug;
        return Str::random(8);
    }
}
