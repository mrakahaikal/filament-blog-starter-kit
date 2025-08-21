<?php

namespace App\Filament\Resources\Blog\Comments;

use App\Filament\Resources\Blog\Comments\Pages\CreateComment;
use App\Filament\Resources\Blog\Comments\Pages\EditComment;
use App\Filament\Resources\Blog\Comments\Pages\ListComments;
use App\Filament\Resources\Blog\Comments\Schemas\CommentForm;
use App\Filament\Resources\Blog\Comments\Tables\CommentsTable;
use App\Models\Blog\Comment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CommentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommentsTable::configure($table);
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
            'index' => ListComments::route('/'),
            'create' => CreateComment::route('/create'),
            'edit' => EditComment::route('/{record}/edit'),
        ];
    }
}
