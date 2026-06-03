<?php

namespace App\Filament\Admin\Resources\BlueprintResource\Pages;

use App\Filament\Admin\Resources\BlueprintResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlueprints extends ListRecords
{
    protected static string $resource = BlueprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}