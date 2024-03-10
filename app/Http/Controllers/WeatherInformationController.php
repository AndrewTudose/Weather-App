<?php

namespace App\Http\Controllers;

use App\Models\WeatherInformation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class WeatherInformationController extends Controller
{

    public function index(Request $request)
    {

        $filters = [
            'minimumTemperature' => $request->input('min'),
            'maximumTemperature' => $request->input('max'),

            'minimumHour' => $request->input('minHour'),
            'maximumHour' => $request->input('maxHour'),

            'minimumDate' => $request->input('minDate'),
            'maximumDate' => $request->input('maxDate'),
        ];

        if($request->ajax()) {

            $query = WeatherInformation::select('*')
                    ->filter($filters);

            return DataTables::of($query)
                ->addIndexColumn()
                ->make(true);

        }

        return view(
            '/Main/index',
            [
                'isLogged' => Auth::check()
            ]
        );
    }

}
