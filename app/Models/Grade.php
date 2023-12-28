<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;

    protected static function boot(): void
    {
        parent::boot();

        Relation::morphMap([
            'resource' => Resource::class,
            'user' => User::class
        ]);
    }

    public function resources(): MorphToMany
    {
        return $this->morphedByMany(Resource::class, 'gradeable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
