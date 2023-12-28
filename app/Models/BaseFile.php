<?php

namespace App\Models;


/**
 * @property string mime_type
 * @property string original_filename
 * @property string filename
 * @property string hash
 * @property string extension
 * @property string path
 * @property int size
 * @property string disk
 */
class BaseFile extends File
{

    protected $table = 'files';

    public function setMimeType(string $mime): void
    {
        $this->mime_type = $mime;
    }

    public function setOriginalFilename(string $name): void
    {
        $this->original_filename = $name;
    }

    public function setFilename(string $name): void
    {
        $this->filename = $name;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function setDisk(string $disk): void
    {
        $this->disk = $disk;
    }

    public function getMimeType(): string
    {
        return $this->mime_type;
    }

    public function getOriginalFilename(): string
    {
        return $this->original_filename;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getDisk(): string
    {
        return $this->disk;
    }
}
