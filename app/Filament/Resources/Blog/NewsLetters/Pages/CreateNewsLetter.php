<?php

namespace App\Filament\Resources\Blog\NewsLetters\Pages;

use App\Filament\Resources\Blog\NewsLetters\NewsLetterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsLetter extends CreateRecord
{
    protected static string $resource = NewsLetterResource::class;
}
