<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\Tag;

use App\Data\TagDto;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagService
{
    public function store(TagDto $data): Tag
    {
        /** @var Tag */
        return Tag::query()->create([
            'name' => $data->name
        ]);
    }

    public function storeMany(Collection $tagNames): Collection
    {
        return $tagNames->map(function ($name) {
            return Tag::query()->firstOrCreate(['name' => $name]);
        });
    }
}
