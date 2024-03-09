<?php

namespace App\Filament\Resources\WeatherInformationResource\Pages;

use App\Filament\Resources\WeatherInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeatherInformation extends EditRecord
{
    protected static string $resource = WeatherInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
