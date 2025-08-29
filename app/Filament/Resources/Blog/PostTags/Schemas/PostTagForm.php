<?php

namespace App\Filament\Resources\Blog\PostTags\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;

class PostTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->live(onBlur: true, debounce: 300)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->unique('post_tags', 'name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('slug')
                    ->unique('post_tags', 'slug')
                    ->readOnly()
                    ->maxLength(155),
            ]);
    }
}
