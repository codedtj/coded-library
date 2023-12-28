<?php


namespace App\Services\Library;

use App\Data\ResourceDto;
use App\Models\BaseFile;
use App\Models\Resource;
use App\Services\File\DirectoryProviders\FileTypeDirectoryProvider;
use App\Services\File\Image\ImageService;
use App\Services\File\UploadedFileService;
use App\Services\Tag\TagService;

class ResourceService
{

    public UploadedFileService $fileService;
    public ImageService $imageService;
    public TagService $tagService;

    public function __construct(UploadedFileService $fileService, ImageService $imageService, TagService $tagService)
    {
        $this->fileService = $fileService;
        $this->imageService = $imageService;
        $this->tagService = $tagService;
    }

    public function store(ResourceDto $data): Resource
    {
        /** @var Resource $resource */
        $resource = Resource::query()->create($this->getAttributesArray($data));

        return $this->updateRelations($resource, $data);

    }

    public function edit(Resource $resource, ResourceDto $data): Resource
    {
         $resource->update($this->getAttributesArray($data));

//        if ($data->cover) {
//            $this->destroyResourceCover($resource);
//        }
//
//
        if ($data->file) {
            $this->destroyResourceFile($resource);
        }

        return $this->updateRelations($resource, $data);
    }

    private function destroyResourceFile(Resource $resource): void
    {
        if($resource->file){
            $file = $resource->file->replicate();
            $resource->file()->dissociate();
            $this->fileService->destroy($file);
        }
    }

    private function destroyResourceCover(Resource $resource): void
    {
        if($resource->cover){
            $cover = $resource->cover->replicate();
            $resource->cover()->dissociate();
            $this->imageService->destroy($cover);
        }
    }

    private function getAttributesArray(ResourceDto $data): array
    {
        return [
            'title' => $data->title,
            'author' => $data->author,
            'year' => $data->year,
            'description' => $data->description,
            'is_public' => $data->is_public,
            'category_id' => $data->category_id,
            'language' => $data->language,
            'type' => $data->type->value,
        ];
    }

    private function updateRelations(Resource $resource, ResourceDto $data): Resource
    {
        if ($data->file) {
            $dirProvider = new FileTypeDirectoryProvider($data->file);
            $file = $this->fileService->store($data->file, $dirProvider->getDirectory(), new BaseFile());
            $resource->file()->associate($file);
        }
//
//        if ($data->cover) {
//            $dirProvider = new FileTypeDirectoryProvider($data->cover);
//            $cover = $this->imageService->store($data->cover, $dirProvider);
//            $resource->cover()->associate($cover);
//        }

//        $resource->tags()->sync($this->tagService->storeMany($data->tags)->pluck('id'));

//        $resource->roles()->sync($data->roles);
//
//        $resource->grades()->sync($data->grades);

        $resource->save();

        return $resource;
    }

    public function destroy(Resource $resource): bool
    {
        $this->destroyResourceFile($resource);
        $this->destroyResourceCover($resource);
        return $resource->delete();
    }
}
