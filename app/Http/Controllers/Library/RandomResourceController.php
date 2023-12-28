<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\BaseFile;
use App\Models\Resource;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RandomResourceController extends Controller
{
    public function getAny(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $resource = Resource::query()->inRandomOrder()->first();

        return redirect(route('resources.show', $resource->id));
    }

    public function getAnyVideo(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $file = BaseFile::query()->where('mime_type', 'like', 'video%')->inRandomOrder()->first();

        $resource = Resource::query()->where('file_id', $file->id)->first();

        return redirect(route('resources.open', $resource->id));
    }
}
