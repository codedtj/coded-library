<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace App\Services\File\Image\ImageEditOperation;


use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

class ResizeImageOperation extends EditOperation
{

    private int $width;

    private int $height;

    public function __construct(ImageEditOperation $operation, int $width, int $height)
    {
        parent::__construct($operation);

        $this->width = $width;

        $this->height = $height;
    }

    public function execute(string $path): Image
    {
        return ImageFacade::make($path)->resize($this->width, $this->height);
    }
}
