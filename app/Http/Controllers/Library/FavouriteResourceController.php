<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FavouriteResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagination = auth()->user()->favouriteResources()->latest()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('FavouriteResource/Index', [
                'pagination' => $pagination
            ]);
    }

    public function store()
    {
        return auth()->user()->favouriteResources()->attach(request()->get('resource'));
    }

    public function destroy($resource)
    {
        return auth()->user()->favouriteResources()->detach($resource);
    }
}
