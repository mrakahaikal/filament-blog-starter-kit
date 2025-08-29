<?php

namespace App\Filament\Resources\Blog\PostTags;

use App\Filament\Resources\Blog\PostTags\Pages\CreatePostTag;
use App\Filament\Resources\Blog\PostTags\Pages\EditPostTag;
use App\Filament\Resources\Blog\PostTags\Pages\ListPostTags;
use App\Filament\Resources\Blog\PostTags\Schemas\PostTagForm;
use App\Filament\Resources\Blog\PostTags\Tables\PostTagsTable;
use App\Models\Blog\PostTag;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostTagResource extends Resource
{
    protected static ?string $model = PostTag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|UnitEnum|null $navigationGroup = 'Blog';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return PostTagForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostTagsTable::configure($table);
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
            'index' => ListPostTags::route('/'),
        ];
    }
}
