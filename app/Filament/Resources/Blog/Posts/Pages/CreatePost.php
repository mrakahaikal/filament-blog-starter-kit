<?php

namespace App\Filament\Resources\Blog\Posts\Pages;

use App\Models\Blog\Post;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Blog\Posts\PostResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
