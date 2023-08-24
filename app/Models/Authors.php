<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Authors extends Model
{
    use HasFactory, Sluggable, HasSEO;

    public $fillable = [
        'name',
        'biography',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function modalities()
    {
        return $this->belongsToMany(Modality::class, 'authors_modalities', 'author_id', 'modality_id')->withTimestamps();
    }
}
