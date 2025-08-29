<?php

namespace App\Filament\Pages\Settings;

use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;

class AccountSettingsPage extends MyProfilePage
{
    protected string $view = 'filament.pages.settings.account-settings-page';

    protected static ?int $navigationSort = 10;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user';

}
