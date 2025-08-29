<?php

namespace App\Filament\Resources\Blog\Posts\Tables;

use App\Models\Blog\Post;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->description(fn(Post $record): ?string => Str::limit($record->sub_title, 40))
                    ->searchable()->limit(20),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state): mixed => $state->getColor()),

                ImageColumn::make('cover_photo_path')
                    ->label('Cover Photo'),

                ImageColumn::make('user.avatar_url')
                    ->circular()
                    ->label('Author'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
