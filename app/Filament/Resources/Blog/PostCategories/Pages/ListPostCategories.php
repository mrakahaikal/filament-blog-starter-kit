<?php

namespace App\Filament\Resources\Blog\PostCategories\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\Blog\PostCategories\PostCategoryResource;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('filament-blog.resource_title_categories');
    }

    public function getHeading(): string
    {
        return __('filament-blog.resource_heading_categories');
    }

    public function getSubheading(): string
    {
        return __('filament-blog.resource_sub_heading_categories');
    }
}
