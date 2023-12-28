<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Contracts\Pagination\Paginator;
use Inertia\Inertia;
use Inertia\Response;

class GradeResourceController extends Controller
{
    public function index()
    {
        return Inertia::render('GradeResource/Index', [
            'grades' => Grade::all()
        ]);
    }

    public function show(Grade $grade): Paginator|Response
    {

        $pagination = $grade->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('GradeResource/Show', [
                'pagination' => $pagination,
                'grade' => $grade
            ]);
    }
}
