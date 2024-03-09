<?php

namespace App\Filament\Resources\WeatherInformationResource\Pages;

use App\Filament\Resources\WeatherInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWeatherInformation extends CreateRecord
{
    protected static string $resource = WeatherInformationResource::class;
}
