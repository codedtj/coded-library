<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Tag;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class FilteredTagController extends Controller
{
    public function index($name): Collection
    {
        return Tag::query()->where('name', 'like', '%' . $name . '%')->get();
    }
}
