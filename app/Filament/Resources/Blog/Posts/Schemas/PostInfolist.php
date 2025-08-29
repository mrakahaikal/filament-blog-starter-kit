<?php

namespace App\Filament\Resources\Blog\Posts\Schemas;

use App\Enums\PostStatus;
use App\Models\Blog\Post;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Post')
                ->schema([
                    Fieldset::make('General')
                        ->schema([
                            TextEntry::make('title'),

                            TextEntry::make('slug'),

                            TextEntry::make('sub_title'),
                        ]),

                    Fieldset::make('Publish Information')
                        ->schema([
                            TextEntry::make('status')
                                ->badge()->color(function ($state) {
                                    return $state->getColor();
                                }),

                            TextEntry::make('published_at')->visible(fn(Post $record): bool => $record->status === PostStatus::PUBLISHED),

                            TextEntry::make('scheduled_for')->visible(fn(Post $record): bool => $record->status === PostStatus::SCHEDULED),
                        ]),

                    Fieldset::make('Description')
                        ->schema([
                            TextEntry::make('body')
                                ->html()
                                ->columnSpanFull(),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }
}
