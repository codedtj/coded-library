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

        if (Str::length($query) > 0) {
            $q = '%' . $query . '%';

            $pagination = Resource::query()
                ->with('category')
                ->where('title', 'like', $q)
                ->orWhere('author', 'like', $q)
                ->orWhere('description', 'like', $q)
                ->latest()
                ->simplePaginate(20);
        } else {
            $pagination = Resource::query()->latest()->simplePaginate(20);
        }

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('Public/EntryPoint', [
                'query' => $query,
                'pagination' => $pagination
            ]);
    }
}
