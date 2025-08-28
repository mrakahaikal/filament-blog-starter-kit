<?php

namespace App\Filament\Resources\Blog\PostCategories;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Blog\PostCategory;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\Blog\PostCategories\Pages\EditPostCategory;
use App\Filament\Resources\Blog\PostCategories\Pages\ViewPostCategory;
use App\Filament\Resources\Blog\PostCategories\Pages\ListPostCategories;
use App\Filament\Resources\Blog\PostCategories\Schemas\PostCategoryForm;
use App\Filament\Resources\Blog\PostCategories\Tables\PostCategoriesTable;
use App\Filament\Resources\Blog\PostCategories\Schemas\PostCategoryInfolist;
use App\Filament\Resources\Blog\PostCategories\RelationManagers\PostsRelationManager;

class PostCategoryResource extends Resource
{
    protected static ?string $model = PostCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PostCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PostCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPostCategories::route('/'),
            'view' => ViewPostCategory::route('/{record}'),
            'edit' => EditPostCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-blog.resource_nav_label_categories');
    }

    public static function getBreadcrumb(): string
    {
        return __('filament-blog.resource_breadcrumb_categories');
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            $record->slug,
        ];
    }
}
