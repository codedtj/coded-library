<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 15.07.2020
 */

namespace App\Services\File\Image;


use App\Http\Responses\FileResponse;
use App\Models\File;
use App\Models\Image;
use App\Services\File\DirectoryProviders\DirectoryProvider;
use App\Services\File\InterventionImageFileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageService
{
    public function __construct(
        private readonly InterventionImageFileService $fileService,
        private readonly ImageEditService $editService
    ) {
    }

    public function store(UploadedFile $file, DirectoryProvider $provider, array $editOptions = []): File
    {
        $image = $this->editService->edit($file->getRealPath(), $editOptions);
        return $this->fileService->store($image, $provider->getDirectory(), new Image());
    }

    public function show(string $id, ?Collection $editOptions = null, bool $cache = false)
    {
        $image = Image::query()->findOrFail($id);

        if ($editOptions && $editOptions->count() > 0) {
            $cacheFolder = 'cache/' . $this->getCacheFolder($editOptions);

            if (Storage::exists($cacheFolder . $image->path)) {
                return $this->generateResponse($cacheFolder . $image->path, $image->mime_type);
            } else {
                $editedImg = $this->editService->edit(storage_path("app/{$image->path}"), $editOptions->all());

                if ($cache) Storage::disk('local')->put($cacheFolder . $image->path, $editedImg->encode(null, $editOptions->get('quality', 100)));

                return $editedImg->response($image->extension);
            }
        }

        return $this->generateResponse($image->path, $image->mime_type);
    }

    private function getCacheFolder(Collection $options)
    {
        return $options->sortKeys()->keys()->reduce(function ($path, $option) use ($options) {
            return $path . $option . implode($options[$option]) . '/';
        });
    }

    private function generateResponse($path, $mime): Response|StreamedResponse|JsonResponse
    {
        $response = new FileResponse($path, $mime);
        return $response->generateResponse();
    }

    public function destroy(Image $image): ?bool
    {
        $this->fileService->destroy($image);
        return $image->delete();
    }
}
