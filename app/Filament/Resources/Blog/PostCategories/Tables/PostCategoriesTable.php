<?php

namespace App\Filament\Resources\Blog\PostCategories\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class PostCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-blog.table_head_label_categories_name'))
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('filament-blog.table_head_label_categories_slug')),
                TextColumn::make('posts_count')
                    ->label(__('filament-blog.table_head_label_categories_post_count'))
                    ->badge()
                    ->counts('posts'),
                TextColumn::make('created_at')
                    ->label(__('filament-blog.table_head_label_created_at'))
                    ->dateTime('j F Y - H:i', env('APP_TIMEZONE', 'UTC'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-blog.table_head_label_updated_at'))
                    ->dateTime('j F Y - H:i', env('APP_TIMEZONE', 'UTC'))
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
                CreateAction::make()
                    ->label(__('filament-blog.btn_label_new_categories'))
                    ->icon('heroicon-s-plus')
            ]);
    }
}
