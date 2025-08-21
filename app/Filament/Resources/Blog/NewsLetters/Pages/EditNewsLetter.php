<?php

namespace App\Filament\Resources\Blog\NewsLetters\Pages;

use App\Filament\Resources\Blog\NewsLetters\NewsLetterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNewsLetter extends EditRecord
{
    protected static string $resource = NewsLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
