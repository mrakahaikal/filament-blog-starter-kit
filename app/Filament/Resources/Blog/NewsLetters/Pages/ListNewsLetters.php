<?php

namespace App\Filament\Resources\Blog\NewsLetters\Pages;

use App\Filament\Resources\Blog\NewsLetters\NewsLetterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNewsLetters extends ListRecords
{
    protected static string $resource = NewsLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
