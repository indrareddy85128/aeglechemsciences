<?php

namespace App\Filament\Resources\WhyChooseusResource\Pages;

use App\Filament\Resources\WhyChooseusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyChooseuses extends ListRecords
{
    protected static string $resource = WhyChooseusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
