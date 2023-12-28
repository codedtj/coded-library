<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace App\Services\File\Image\ImageEditOperation;


use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

class MakeImageOperation implements ImageEditOperation
{

    public function execute(string $path): Image
    {
        return ImageFacade::make($path);
    }
}
