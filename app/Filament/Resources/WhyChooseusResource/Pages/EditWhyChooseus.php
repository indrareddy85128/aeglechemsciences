<?php

namespace App\Filament\Resources\WhyChooseusResource\Pages;

use App\Filament\Resources\WhyChooseusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyChooseus extends EditRecord
{
    protected static string $resource = WhyChooseusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
