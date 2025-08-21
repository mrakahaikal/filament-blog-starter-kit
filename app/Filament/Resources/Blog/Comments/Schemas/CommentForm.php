<?php

namespace App\Filament\Resources\Blog\Comments\Schemas;

use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }
}
