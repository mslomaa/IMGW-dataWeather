<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ImgwController extends Controller
{
    public function index(){
        $dataWeather = Http::get('https://danepubliczne.imgw.pl/api/data/synop')->json();

        for ($i = 0; $i < sizeof($dataWeather); $i++){
            $idStation = $dataWeather[$i]['id_stacji'];
            $station = $dataWeather[$i]['stacja'];
            $dateCheck = $dataWeather[$i]['data_pomiaru'];
            $hourCheck = $dataWeather[$i]['godzina_pomiaru'];
            $temperature = $dataWeather[$i]['temperatura'];
            $wind = $dataWeather[$i]['predkosc_wiatru'];
            $directWind =$dataWeather[$i]['kierunek_wiatru'];
            $humidity = $dataWeather[$i]['wilgotnosc_wzgledna'];
            $rain = $dataWeather[$i]['suma_opadu'];
            $pressure = $dataWeather[$i]['cisnienie'];


            // var_dump($dataWeather);
            DB::table('weather_data')
                ->insert([
                    'id_stacji' => $idStation,
                    'stacja' => $station,
                    'data_pomiaru' => $dateCheck,
                    'godzina_pomiaru' => $hourCheck,
                    'temperatura' => $temperature,
                    'predkosc_wiatru' => $wind,
                    'kierunek_wiatru' => $directWind,
                    'wilgotnosc_wzgledna' => $humidity,
                    'suma_opadu' => $rain,
                    'cisnienie' => $pressure
                ]);

        }
        
        return view('imgw');
    }
}
