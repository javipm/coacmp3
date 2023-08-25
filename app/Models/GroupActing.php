<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class GroupActing extends Model
{
    use HasFactory, Sluggable, HasSEO;

    protected $table = 'groups_actings';

    public $fillable = [
        'phase',
        'filename',
        'group_id',
    ];

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
            ],
        ];
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}
