<?php

namespace App\Filament\Resources\Blog\PostTags\Pages;

use App\Filament\Resources\Blog\PostTags\PostTagResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPostTag extends EditRecord
{
    protected static string $resource = PostTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
