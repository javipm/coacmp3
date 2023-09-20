<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class GroupActing extends Model
{
    use HasFactory, HasSEO, Sluggable, SluggableScopeHelpers;

    protected $table = 'groups_actings';

    public $fillable = [
        'phase',
        'filename',
        'group_id',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $appends = ['url'];

    public const PHASES = [
        'Preliminares' => 'Preliminares',
        'Cuartos' => 'Cuartos',
        'Semifinales' => 'Semifinales',
        'Final' => 'Final',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'phase',
                'unique' => false,
            ],
        ];
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function getUrlAttribute(): string
    {
        return env('APP_URL_AUDIOS').'/'.$this->group->year.'/'.$this->filename;
    }
}
