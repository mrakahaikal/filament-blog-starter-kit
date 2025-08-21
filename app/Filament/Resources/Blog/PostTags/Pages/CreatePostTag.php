<?php

namespace App\Filament\Resources\Blog\PostTags\Pages;

use App\Filament\Resources\Blog\PostTags\PostTagResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePostTag extends CreateRecord
{
    protected static string $resource = PostTagResource::class;
}
