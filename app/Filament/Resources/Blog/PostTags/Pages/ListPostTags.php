<?php

namespace App\Filament\Resources\Blog\PostTags\Pages;

use App\Filament\Resources\Blog\PostTags\PostTagResource;
use Filament\Resources\Pages\ListRecords;

class ListPostTags extends ListRecords
{
    protected static string $resource = PostTagResource::class;
}
