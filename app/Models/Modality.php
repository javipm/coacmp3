<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Modality extends Model
{
    use HasFactory, Sluggable, HasSEO;

    public $fillable = [
        'name',
        'description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'authors_modalities', 'modality_id', 'author_id')->withTimestamps();
    }
}
