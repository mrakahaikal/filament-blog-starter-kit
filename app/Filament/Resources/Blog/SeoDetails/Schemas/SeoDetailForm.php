<?php

namespace App\Filament\Resources\Blog\SeoDetails\Schemas;

use App\Models\Blog\Post;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;

class SeoDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('post_id')
                    ->relationship('post', 'title')
                    ->unique('seo_details', 'post_id', )
                    ->required()
                    ->preload()
                    ->searchable()
                    ->default(request('post_id') ?? '')
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TagsInput::make('keywords')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }
}
