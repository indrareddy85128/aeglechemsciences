<?php

namespace App\Filament\Resources\MissionVisionValueResource\Pages;

use App\Filament\Resources\MissionVisionValueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMissionVisionValue extends EditRecord
{
    protected static string $resource = MissionVisionValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
