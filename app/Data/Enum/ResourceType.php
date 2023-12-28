<?php

namespace App\Data\Enum;

enum ResourceType: int
{
    case Book = 0;
    case Article = 1;
    case Video = 2;
    case Audio = 3;
}
