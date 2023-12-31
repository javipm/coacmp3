<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Group extends Model
{
    use HasFactory, HasSEO, Searchable, Sluggable, SluggableScopeHelpers;

    public $fillable = [
        'name',
        'description',
        'modality_id',
        'year',
        'director',
        'city',
        'is_completed',
        'is_featured',
        'pageviews',
    ];

    protected $appends = ['authors_music_id', 'authors_lyrics_id'];

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            if ($model->modality()->count() && $model->authorsLyrics()->count() && $model->authorsMusic()->count() && $model->director && $model->city) {
                $model->is_completed = true;
            } else {
                $model->is_completed = false;
            }
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function modality(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Modality::class, 'id', 'modality_id');
    }

    public function director(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Author::class, 'id', 'director_id');
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

    /** Virtual attribute authors_music_id for use filament refreshFormData */
    public function getAuthorsMusicIdAttribute(): array
    {
        return $this->authorsMusic()->pluck('authors.id')->toArray();
    }

    /** Virtual attribute authors_lyrics_id for use filament refreshFormData */
    public function getAuthorsLyricsIdAttribute(): array
    {
        return $this->authorsLyrics()->pluck('authors.id')->toArray();
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = $this->transform($array);

        $authorsLyrics = $this->authorsLyrics->map(function ($data) {
            return [$data['id'] => $data['name']];
        })->toArray();

        $authorsMusic = $this->authorsMusic->map(function ($data) {
            return [$data['id'] => $data['name']];
        })->toArray();

        $array['authors'] = array_unique(array_merge($authorsMusic, $authorsLyrics), SORT_REGULAR);

        return $array;
    }
}
