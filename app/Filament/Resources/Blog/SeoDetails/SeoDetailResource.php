<?php

namespace App\Filament\Resources\Blog\SeoDetails;

use App\Filament\Resources\Blog\SeoDetails\Pages\CreateSeoDetail;
use App\Filament\Resources\Blog\SeoDetails\Pages\EditSeoDetail;
use App\Filament\Resources\Blog\SeoDetails\Pages\ListSeoDetails;
use App\Filament\Resources\Blog\SeoDetails\Schemas\SeoDetailForm;
use App\Filament\Resources\Blog\SeoDetails\Tables\SeoDetailsTable;
use App\Models\Blog\SeoDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SeoDetailResource extends Resource
{
    protected static ?string $model = SeoDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SeoDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SeoDetailsTable::configure($table);
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
            'index' => ListSeoDetails::route('/'),
            'create' => CreateSeoDetail::route('/create'),
            'edit' => EditSeoDetail::route('/{record}/edit'),
        ];
    }
}
