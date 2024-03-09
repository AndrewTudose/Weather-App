<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherInformation;

class AddWeatherInformation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-weather-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private string $location = "Chisinau";
    private string $apiKey = "642b1020b6f8447db2c155933240603";

    /**
        * Execute the console command.
    */

    public function handle()
    {
        
        $response = Http::get(
            "http://api.weatherapi.com/v1/forecast.json?key=$this->apiKey&q=$this->location"
        );

        if($response->ok() && isset($response->json()['forecast']['forecastday'][0]['hour']) ) {

            foreach($response->json()['forecast']['forecastday'][0]['hour'] as $hourData) {
                $this->insertData($hourData);
            }
            
        } else {

            info($response);

        }
    }

    private function insertData($hourData) : void
    {

        WeatherInformation::create([
            'capital' => $this->location,
            'date' => $this->getDate($hourData['time']),
            'hour' => $this->getHour($hourData['time']),
            'temperature' => $hourData['temp_c'],
            'is_day' => $hourData['is_day'],
            ]
        );
    }
    
    private function getDate(string $dateTime) : string
    {
        return date_format(date_create($dateTime), 'Y/m/d');
    }
    
    private function getHour(string $dateTime) : string
    {
        return date_format(date_create($dateTime), 'H:i');
    }
}
