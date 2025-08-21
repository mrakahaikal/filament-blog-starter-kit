<?php

namespace App\Filament\Resources\Blog\PostTags\Pages;

use App\Filament\Resources\Blog\PostTags\PostTagResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostTags extends ListRecords
{
    protected static string $resource = PostTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
