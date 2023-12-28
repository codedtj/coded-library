<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\DirectoryProviders;


use App\Helpers\File;
use Illuminate\Http\UploadedFile;

class FileTypeDirectoryProvider implements DirectoryProvider
{
    private UploadedFile $file;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function getDirectory(): string
    {
        return File::getUploadedFileType($this->file) . 's';
    }

    public function setFile(UploadedFile $file): void
    {
        $this->file = $file;
    }
}
