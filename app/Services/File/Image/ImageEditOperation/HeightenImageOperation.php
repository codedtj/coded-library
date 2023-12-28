<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\Image\ImageEditOperation;


use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

class HeightenImageOperation extends EditOperation
{
    private int $height;


    public function __construct(ImageEditOperation $operation, int $height)
    {
        parent::__construct($operation);

        $this->height = $height;
    }

    public function execute(string $path): Image
    {
        return ImageFacade::make($path)->heighten($this->height);
    }
}
