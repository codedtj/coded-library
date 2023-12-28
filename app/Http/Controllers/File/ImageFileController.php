<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\File;


use App\Http\Controllers\Controller;
use App\Services\File\Image\ImageService;

class ImageFileController extends Controller
{

    public function __construct(private readonly ImageService $service)
    {
    }

    public function show($image)
    {
        $options = null;
        if (request()->get('width') || request()->get('height'))
            $options = collect([
                request()->get('resize') ?? 'resize' => [
                    'width' => request()->get('width'),
                    'height' => request()->get('height')
                ]
            ]);
        return $this->service->show($image, $options, true);
    }
}
