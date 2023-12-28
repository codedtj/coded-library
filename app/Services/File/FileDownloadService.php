<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File;


use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileDownloadService
{
    public function download(File $file): StreamedResponse
    {
        return Storage::disk($file->disk)->download($file->getPath(), $file->getOriginalFilename());
    }
}
