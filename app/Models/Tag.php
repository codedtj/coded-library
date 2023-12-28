<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Tag extends Model
{
    protected static function boot(): void
    {
        parent::boot();

        Relation::morphMap([
            'resource' => Resource::class
        ]);
    }

    public function resources(): MorphToMany
    {
        return $this->morphedByMany(Resource::class, 'taggable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
