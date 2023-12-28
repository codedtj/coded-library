<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Models;


use App\Data\Enum\ResourceType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Image cover
 * @property BaseFile file
 * @property String id
 * @property String file_id
 * @property String created_by
 * @property ResourceType type
 */
class Resource extends Model
{
    use SoftDeletes;

    protected $casts = [
        'is_public' => 'boolean',
        'type' => ResourceType::class,
    ];

//    protected static function booted(): void
//    {
//        static::addGlobalScope('public', function (Builder $query) {
//            $query->where('is_public', true);
//        });
//    }
//
//    public function resolveRouteBinding($value, $field = null): ?Model
//    {
//        return Resource::withoutGlobalScope('public')->with('tags', 'category')->findOrFail($value);
//    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(BaseFile::class, 'file_id');
    }

    /**
     * Get resource cover
     */
//    public function cover(): BelongsTo
//    {
//        return $this->belongsTo(Image::class);
//    }

//    public function tags(): MorphToMany
//    {
//        return $this->morphToMany(Tag::class, 'taggable')
//            ->using(BaseMorphPivot::class)
//            ->withTimestamps();
//    }

    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

//    public function grades(): MorphToMany
//    {
//        return $this->morphToMany(Grade::class, 'gradeable')
//            ->using(BaseMorphPivot::class)
//            ->withTimestamps();
//    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

//    public function theme(): BelongsTo
//    {
//        return $this->belongsTo(Theme::class);
//    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourite_resources')->using(BasePivot::class)->withTimestamps();
    }

}
