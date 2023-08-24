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

    public function groups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Group::class, 'author_id', 'id');
    }

    public function modality(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Modality::class, 'id', 'modality_id');
    }

    public function authorsLyrics(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'groups_authors_lyrics', 'group_id', 'author_id')->withTimestamps();
    }

    public function authorsMusic(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'groups_authors_music', 'group_id', 'author_id')->withTimestamps();
    }

    public function actings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GroupActing::class, 'group_id', 'id');
    }
}
