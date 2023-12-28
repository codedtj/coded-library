<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Contracts\Pagination\Paginator;
use Inertia\Inertia;
use Inertia\Response;

class ThemeResourceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('ThemeResource/Index', [
            'themes' => Theme::all()
        ]);
    }

    public function show(Theme $theme): Paginator|Response
    {
        $pagination = $theme->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('ThemeResource/Show', [
                'pagination' => $pagination,
                'theme' => $theme
            ]);
    }
}
