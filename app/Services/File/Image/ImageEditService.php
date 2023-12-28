<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace App\Services\File\Image;


use App\Services\File\Image\ImageEditOperation\EditOperation;
use App\Services\File\Image\ImageEditOperation\FitImageOperation;
use App\Services\File\Image\ImageEditOperation\MakeImageOperation;
use App\Services\File\Image\ImageEditOperation\ResizeImageOperation;
use App\Services\File\Image\ImageEditOperation\ResizeOperationFabric;
use Intervention\Image\Image;

class ImageEditService
{
    public function edit(string $path, array $options): Image
    {
        $operations = $this->getEditOperations($options);
        return $operations->execute($path);
    }

    private function getEditOperations(array $options): EditOperation
    {
        $decorator = new EditOperation(new MakeImageOperation());

        if (isset($options['fit']))
            $decorator = new FitImageOperation($decorator, $options['fit']['width'], $options['fit']['height']);

        if (isset($options['resize'])) {
            $decorator = ResizeOperationFabric::make($decorator, $options['resize']);
        }

        return $decorator;
    }
}
