<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\DirectoryProviders;

class ImageDirectoryProvider implements DirectoryProvider
{
    public function getDirectory(): string
    {
        return 'images';
    }
}
