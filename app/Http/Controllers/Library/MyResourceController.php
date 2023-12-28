<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MyResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagination = auth()->user()->resources()->withoutGlobalScope('public')->latest()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('MyResource/Index', [
                'pagination' => $pagination
            ]);
    }
}
