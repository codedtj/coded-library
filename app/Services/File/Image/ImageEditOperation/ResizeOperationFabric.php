<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\Image\ImageEditOperation;


class ResizeOperationFabric
{
    public static function make(ImageEditOperation $operation, array $options)
    {
        $w = $options['width'];
        $h = $options['height'];

        if ($w && $h) {
            return new ResizeImageOperation($operation, $w, $h);
        }
        if ($w) {
            return new WidenImageOperation($operation, $w);
        } else {
            return new HeightenImageOperation($operation, $h);
        }
    }
}
