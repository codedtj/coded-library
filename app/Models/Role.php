<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    protected static function boot(): void
    {
        parent::boot();

        Relation::morphMap([
            'resource' => Resource::class,
            'user' => User::class
        ]);
    }

    public function  scopePublic(Builder $query): Builder
    {
        return $query->whereNotIn('name', [
            'admin', 'editor', 'moderator'
        ]);
    }

    /**
     * Get all of the resources with current role.
     */
    public function resources(): MorphToMany
    {
        return $this->morphedByMany(Resource::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
