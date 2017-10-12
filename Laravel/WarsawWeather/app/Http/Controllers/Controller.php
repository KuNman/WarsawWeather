<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $current = (new \DateTime());

        echo $current;
    }

    public function downloadWeather()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'api.openweathermap.org/data/2.5/weather?q=Warsaw,pl&lang=pl&units=metric&APPID=cec0709ff900c6d42355ce30cfb061b2');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $array = json_decode($response, true);

        $city = 'Warsaw';
        $temp = $array['main']['temp'];
        $wind = $array['wind']['speed'];

        $time = date('Y-m-d H:i:s');

        $last = DB::insert("INSERT INTO weather (city, temp, date, wind) VALUES ('$city', $temp, '$time', $wind )");





    }
}
