<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeatherInformationResource\Pages;
use App\Filament\Resources\WeatherInformationResource\RelationManagers;
use App\Models\WeatherInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeatherInformationResource extends Resource
{
    protected static ?string $model = WeatherInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationLabel = 'Weather';

    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('capital')
                ->required()
                ->maxLength(40),
                Forms\Components\DatePicker::make('date')
                ->required()
                ->displayFormat('Y/m/d'),
                Forms\Components\TimePicker::make('hour')
                ->required()
                ->datalist([
                    '00:00',
                    '01:00',
                    '02:00',
                    '03:00',
                    '04:00',
                    '05:00',
                    '06:00',
                    '07:00',
                    '08:00',
                    '09:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00',
                    '21:00',
                    '22:00',
                    '23:00',
                ])
                ->format('h:i')
                ->seconds(false),
                Forms\Components\TextInput::make('temperature')
                ->required()
                ->numeric()
                ->inputMode('decimal'),
                Forms\Components\TextInput::make('is_day')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('capital')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('hour')
                    ->searchable(),
                Tables\Columns\TextColumn::make('temperature')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_day')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWeatherInformation::route('/'),
            'create' => Pages\CreateWeatherInformation::route('/create'),
            'edit' => Pages\EditWeatherInformation::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
