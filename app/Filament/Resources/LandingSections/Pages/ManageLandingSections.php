<?php

namespace App\Filament\Resources\LandingSections\Pages;

use App\Filament\Resources\LandingSections\LandingSectionResource;
use Filament\Resources\Pages\ManageRecords;

class ManageLandingSections extends ManageRecords
{
    protected static string $resource = LandingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
