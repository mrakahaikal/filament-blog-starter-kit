<?php

namespace App\Filament\Resources\Blog\PostCategories\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament-blog.input_label_categories_name'))
                    ->required()
                    ->unique('post_categories', 'name')
                    ->placeholder(__('filament-blog.input_placeholder_categories_name'))
                    ->helperText(__('filament-blog.input_helper_categories_name'))
                    ->live()
                    ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label(__('filament-blog.input_label_categories_slug'))
                    ->required()
                    ->placeholder(__('filament-blog.input_placeholder_categories_slug'))
                    ->helperText(__('filament-blog.input_helper_categories_slug'))
            ])
            ->columns(1);
    }
}
