<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\Image\ImageEditOperation;


use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

class WidenImageOperation extends EditOperation
{
    private int $width;


    public function __construct(ImageEditOperation $operation, int $width)
    {
        parent::__construct($operation);

        $this->width = $width;
    }

    public function execute(string $path): Image
    {
        return ImageFacade::make($path)->widen($this->width);
    }
}
