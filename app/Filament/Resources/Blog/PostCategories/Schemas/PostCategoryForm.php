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
                    ->label('Name')
                    ->required()
                    ->unique('post_categories', 'name')
                    ->placeholder('Category Name')
                    ->helperText('The name is how it appears on your site.')
                    ->live()
                    ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->placeholder('category-name')
                    ->helperText('The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.')
            ])
            ->columns(1);
    }
}
