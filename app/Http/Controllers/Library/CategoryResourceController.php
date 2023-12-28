<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Inertia\Inertia;
use Inertia\Response;

class CategoryResourceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('CategoryResource/Index', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category): Paginator|Response
    {
        $pagination = $category->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('CategoryResource/Show', [
                'pagination' => $pagination,
                'category' => $category
            ]);
    }
}
