<?php

namespace App\Filament\Resources\Blog\SeoDetails\Pages;

use App\Filament\Resources\Blog\SeoDetails\SeoDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSeoDetail extends EditRecord
{
    protected static string $resource = SeoDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
