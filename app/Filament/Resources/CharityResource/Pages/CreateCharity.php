<?php

namespace App\Filament\Resources\CharityResource\Pages;

use App\Filament\Resources\CharityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCharity extends CreateRecord
{
    protected static string $resource = CharityResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
