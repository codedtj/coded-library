<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace App\Services\File;


use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;

class InterventionImageFileService extends FileService
{
    public function store(Image $file, string $rootPath, File $entity, int $quality = 80,
                          string $extension = 'jpg', string $filename = 'noname',
                          string $disk = 'local'): File
    {
        $encoded = $file->encode($extension, $quality);

        $entity->setHash(hash('sha256', $encoded));
        $entity->setMimeType($file->mime);
        $entity->setOriginalFilename($filename);
        $entity->setExtension($extension);
        $entity->setSize(strlen($encoded->getEncoded()));
        $entity->setDisk($disk);

        $path = $rootPath . '/' . Str::random(3);

        $entity->setFilename($this->createFileName($path, $extension));
        $entity->setPath($path . '/' . $entity->getFilename());
        Storage::disk($disk)->put($entity->getPath(), $encoded);
        $entity->save();

        return $entity;
    }
}
