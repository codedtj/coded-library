<?php


namespace App\Data;


use App\Data\Enum\ResourceType;
use Illuminate\Http\UploadedFile;

class ResourceDto
{
    public string $title;

    public ?string $description;

    public ?string $author;

    public ?string $year;

    public string $language;

    public bool $is_public;

    public ?string $category_id;

    public ResourceType $type;

    public ?UploadedFile $file;

    public function __construct(array $parameters = [])
    {
        $this->title = $parameters['title'];
        $this->author = $parameters['author'];
        $this->description = $parameters['description'];
        $this->year = $parameters['year'];
        $this->language = $parameters['language'];
        $this->is_public = $parameters['is_public'];
        $this->category_id = $parameters['category_id'];
        $this->file = $parameters['file'];
        $this->type = ResourceType::from($parameters['type']);
    }
}
