<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace App\Services\File\Image\ImageEditOperation;


use Intervention\Image\Image;

interface ImageEditOperation
{
    public function execute(string $path): Image;
}
