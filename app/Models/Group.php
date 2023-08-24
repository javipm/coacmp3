<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Group extends Model
{
    use HasFactory, Sluggable, HasSEO;

    public $fillable = [
        'name',
        'description',
        'author_id',
        'modality_id',
        'year',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function modality(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Modality::class, 'id', 'modality_id');
    }
}
