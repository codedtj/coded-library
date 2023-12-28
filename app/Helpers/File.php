<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class File
{
    public static function getUploadedFileType(UploadedFile $file): string
    {
        return Str::of($file->getClientMimeType())->before('/');
    }
}
