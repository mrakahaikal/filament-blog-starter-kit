<?php

namespace App\Filament\Resources\Blog\PostCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class PostCategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                    ])->columns(2)
                    ->icon('heroicon-o-square-3-stack-3d')
                    ->columnSpanFull(),
            ]);
    }
}
