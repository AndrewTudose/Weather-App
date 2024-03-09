<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'capital',
        'date',
        'hour',
        'temperature',
        'is_day'
    ];

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return  $query->when(
            isset($filters['minimumTemperature']),
            fn ($query, $value) => $query->where('temperature', '>=', $filters['minimumTemperature']
        ))->when(
            isset($filters['maximumTemperature']),
            fn ($query, $value) => $query->where('temperature', '<=', $filters['maximumTemperature'])
        )->when(
            isset($filters['minimumHour']),
            fn ($query, $value) => $query->where('hour', '>=', $filters['minimumHour']
                )
        )->when(
            isset($filters['maximumHour']),
            fn ($query, $value) => $query->where('hour', '<=', $filters['maximumHour']
                )
        )->when(
            isset($filters['minimumDate']),
            fn ($query, $value) => $query->where('date', '>=', $filters['minimumDate']
                )
        )
        ->when(
            isset($filters['maximumDate']),
            fn ($query, $value) => $query->where('date', '<=', $filters['maximumDate']
                )
        );
    }
}
