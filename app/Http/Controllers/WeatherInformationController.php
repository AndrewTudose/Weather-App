<?php

namespace App\Http\Controllers;

use App\Models\WeatherInformation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WeatherInformationController extends Controller
{

    public function index(Request $request)
    {

        $isAdmin = $this->checkAdmin($request);

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
                'isAdmin' => $isAdmin
            ]
        );
    }

    private function checkAdmin(Request $request) : bool
    {
        $sessionDatas = $request->session()->all();

        foreach($sessionDatas as $sessionDataKey =>$sessionDataValue) {
            if(preg_match('/login_admin/',$sessionDataKey)) {
                return true;
            }
        }

        return false;
    }
}
