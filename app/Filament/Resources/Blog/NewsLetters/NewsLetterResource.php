<?php

namespace App\Filament\Resources\Blog\NewsLetters;

use App\Filament\Resources\Blog\NewsLetters\Pages\CreateNewsLetter;
use App\Filament\Resources\Blog\NewsLetters\Pages\EditNewsLetter;
use App\Filament\Resources\Blog\NewsLetters\Pages\ListNewsLetters;
use App\Filament\Resources\Blog\NewsLetters\Schemas\NewsLetterForm;
use App\Filament\Resources\Blog\NewsLetters\Tables\NewsLettersTable;
use App\Models\Blog\NewsLetter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NewsLetterResource extends Resource
{
    protected static ?string $model = NewsLetter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return NewsLetterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsLettersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNewsLetters::route('/'),
            'create' => CreateNewsLetter::route('/create'),
            'edit' => EditNewsLetter::route('/{record}/edit'),
        ];
    }
}
