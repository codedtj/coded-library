<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Paginator|Response|null
    {
        $query = request()->query('query');

        $pagination = Resource::query()
            ->when($query, function ($queryBuilder) use ($query) {
                $q = '%' . $query . '%';
                return $queryBuilder
                    ->where('title', 'like', $q)
                    ->orWhere('author', 'like', $q)
                    ->orWhere('description', 'like', $q);
            })
            ->with('category') // Eager load category for all resources
            ->latest()
            ->simplePaginate(20);

        if (request()->expectsJson()) {
            return $pagination;
        } else {
            return Inertia::render('Public/EntryPoint', [
                'query' => $query,
                'pagination' => $pagination
            ]);
        }
    }
}

