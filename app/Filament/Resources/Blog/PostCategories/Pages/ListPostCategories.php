<?php

namespace App\Filament\Resources\Blog\PostCategories\Pages;

use App\Filament\Resources\Blog\PostCategories\PostCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;
}
