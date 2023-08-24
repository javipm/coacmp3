<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Author extends Model
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

    public function modalities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Modality::class, 'authors_modalities', 'author_id', 'modality_id')->withTimestamps();
    }

    public function groupsLyrics(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'groups_authors_lyrics', 'author_id', 'group_id')->withTimestamps();
    }

    public function groupsMusic(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'groups_authors_music', 'author_id', 'group_id')->withTimestamps();
    }
}
