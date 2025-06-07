<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use Sluggable;
    protected $table = 'blogku';
    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'slug',
        'status',
    ];
     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
