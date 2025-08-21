<?php

namespace App\Filament\Resources\Blog\Comments\Pages;

use App\Filament\Resources\Blog\Comments\CommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
