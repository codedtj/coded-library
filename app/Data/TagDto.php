<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Data;

use Spatie\LaravelData\Data;

class TagDto extends Data
{
    public ?string $id;

    public string $name;
}
