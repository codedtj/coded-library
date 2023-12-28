<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

abstract class File extends Model
{
    use SoftDeletes;

    public abstract function setMimeType(string $mime);

    public abstract function setOriginalFilename(string $name);

    public abstract function setFilename(string $name);

    public abstract function setHash(string $hash);

    public abstract function setExtension(string $extension);

    public abstract function setPath(string $path);

    public abstract function setSize(int $size);

    public abstract function setDisk(string $disk);

    public abstract function getMimeType(): string;

    public abstract function getOriginalFilename(): string;

    public abstract function getFilename(): string;

    public abstract function getHash(): string;

    public abstract function getExtension(): string;

    public abstract function getPath(): string;

    public abstract function getSize(): int;

    public abstract function getDisk(): String;
}
