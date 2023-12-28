<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Public;


use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class SearchController extends Controller
{
    public function index($query): Paginator|Response
    {
        $q = '%' . $query . '%';
        $resources = Resource::query()
            ->where('title', 'like', $q)
            ->orWhere('author', 'like', $q)
            ->orWhere('year', 'like', $q)
            ->orWhere('type', 'like', $q)
            ->orWhereHas('tags', function (Builder $query) use ($q) {
                $query->where('name', 'like', $q);
            })
            ->orWhereHas('category', function (Builder $query) use ($q){
                $query->where('name', 'like', $q);
            })
            ->orWhereHas('theme', function (Builder $query) use ($q){
                $query->where('name', 'like', $q);
            })
            ->latest()
            ->simplePaginate(30);

        if (request()->expectsJson())
            return $resources;
        else
            return Inertia::render('Search/Index', [
                'query' => $query,
                'pagination' => $resources
            ]);
    }
}
