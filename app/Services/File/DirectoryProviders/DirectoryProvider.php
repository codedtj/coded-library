<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Services\File\DirectoryProviders;


interface DirectoryProvider
{
    public function getDirectory() : string;
}
