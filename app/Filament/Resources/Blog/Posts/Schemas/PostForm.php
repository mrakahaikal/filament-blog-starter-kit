<?php

namespace App\Filament\Resources\Blog\Posts\Schemas;

use App\Enums\PostStatus;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Details')
                    ->schema([
                        Fieldset::make('Titles')
                            ->schema([
                                Select::make('category_id')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->relationship('categories', 'name')
                                    ->columnSpanFull(),

                                TextInput::make('title')
                                    ->live(true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set(
                                        'slug',
                                        Str::slug($state)
                                    ))
                                    ->required()
                                    ->unique('posts', 'title')
                                    ->maxLength(255),

                                TextInput::make('slug')
                                    ->maxLength(255),

                                Textarea::make('sub_title')
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Select::make('tag_id')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->relationship('tags', 'name')
                                    ->columnSpanFull(),
                            ]),
                        RichEditor::make('body')
                            ->required()
                            ->columnSpanFull(),
                        Fieldset::make('Feature Image')
                            ->schema([
                                FileUpload::make('cover_photo_path')
                                    ->label('Cover Photo')
                                    ->directory('/blog-feature-images')
                                    ->visibility('public')
                                    ->hint('This cover image is used in your blog post as a feature image. Recommended image size 1200 X 628')
                                    ->image()
                                    ->preserveFilenames()
                                    ->imageEditor()
                                    ->maxSize(1024 * 5)
                                    ->rules('dimensions:max_width=1920,max_height=1004')
                                    ->required(),
                                TextInput::make('photo_alt_text')
                                    ->required(),
                            ])->columns(1),
                        Fieldset::make('Status')
                            ->schema([
                                ToggleButtons::make('status')
                                    ->live()
                                    ->inline()
                                    ->options(PostStatus::class)
                                    ->required(),

                                DateTimePicker::make('scheduled_for')
                                    ->visible(fn(Get $get): bool => $get('status') === PostStatus::SCHEDULED)
                                    ->required(fn(Get $get): bool => $get('status') === PostStatus::SCHEDULED)
                                    ->minDate(now()->addMinutes(5))
                                    ->native(false),
                            ]),
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->nullable(false)
                            ->default(auth()->id()),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
