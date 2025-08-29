<?php

namespace App\Filament\Resources\Blog\Comments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Select::make('post_id')
                    ->relationship('post', 'title')
                    ->required(),

                Textarea::make('comment')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('approved')
                    ->afterStateUpdated(function ($record, $state) {
                        $state != null ? $record->approved_at = now() : $record->approved_at = null;
                        return $state;
                    }),
            ]);
    }
}
