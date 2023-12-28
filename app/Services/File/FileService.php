<?php


namespace App\Services\File;


use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

abstract class FileService
{
    protected function createFileName($path, $extension, $disk = 'local'): string
    {
        $fileName = Str::uuid() . '.' . $extension;

        if (Storage::disk($disk)->exists($path . '/' . $fileName)) {
            return $this->createFileName($path, $extension);
        } else return $fileName;
    }

    public function destroy(File $file)
    {
        Storage::disk($file->disk)->delete($file->getPath());
        return $file->delete();
    }
}
