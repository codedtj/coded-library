<?php


namespace App\Http\Controllers\Library;


use App\Data\ResourceDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Services\Library\ResourceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Models\Grade;
use App\Models\Resource;
use App\Models\Role;
use App\Models\Theme;

class ResourceController extends Controller
{

    private ResourceService $service;

    public function __construct(ResourceService $service)
    {
        $this->service = $service;
        $public = ['index', 'show', 'download', 'open'];
        $this->middleware('auth')->except($public);
        $this->authorizeResource(Resource::class, 'resource');
    }

    public function index()
    {
        $pagination = Resource::latest()->simplePaginate(50);
        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('Resource/Index', [
                'pagination' => $pagination,
                'themes' => Theme::all(),
                'categories' => Category::all(),
                'roles' => Role::public()->get(),
                'grades' => Grade::all()
            ]);
    }

//    public function show(Resource $resource): Response
//    {
//        $resource->increment('views');
//
//        return Inertia::render('Resource/ShowResource', [
//            'resource' => $resource
//        ]);
//    }

    public function create(): Response
    {
        return Inertia::render('Resource/Edit', [
            'categories' => Category::all(),
        ]);
    }

    public function store(CreateResourceRequest $request): RedirectResponse
    {
        $this->service->store(new ResourceDto($request->validated()));
        return Redirect::route('dashboard');
    }

    public function edit(Resource $resource): Response
    {
        $resource->load('file');
        return Inertia::render('Resource/Edit', [
            'categories' => Category::all(),
            'resource' => $resource,
        ]);
    }

    public function update(Resource $resource, UpdateResourceRequest $request): RedirectResponse
    {
        $this->service->edit($resource, new ResourceDto($request->validated()));
        return Redirect::route('resources.index');
    }

    public function destroy(Resource $resource): RedirectResponse
    {
        $this->service->destroy($resource);
        return Redirect::route('resources.index');
    }

    public function download(Resource $resource): RedirectResponse
    {
        $resource->increment('downloads');
        return Redirect::route('files.download', $resource->file_id);
    }

    public function open(Resource $resource): Response
    {
        return Inertia::render('FileViewer/BaseView.vue', [
            'resource' => $resource
        ]);
    }
}
