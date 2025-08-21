<?php

namespace App\Filament\Resources\Blog\PostCategories\Pages;

use App\Filament\Resources\Blog\PostCategories\PostCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPostCategory extends ViewRecord
{
    protected static string $resource = PostCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
