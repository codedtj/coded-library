<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Inertia\Inertia;
use Inertia\Response;

class ResourceController extends Controller
{
    public function show(Resource $resource): Response
    {
        $resource->increment('views');
        $resource->load('category');

        return Inertia::render('Public/Resource/Show', [
            'resource' => $resource
        ]);
    }

    public function view(Resource $resource): Response
    {
        return Inertia::render('Public/Resource/BaseView', [
            'resource' => $resource
        ]);
    }
}
