<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        $current = (new \DateTime())->format('Y-m-d H:i:s');
        $hour = substr($current, -8,2);

        $row = DB::select('select * from weather ORDER BY id DESC LIMIT 1');

        $city = $row[0]->city;
        $temp = $row[0]->temp;
        $time = $row[0]->date;
        $wind = $row[0]->wind;

        $lastHour = substr($time, -8,2);
        if ($hour - $lastHour > 3) {
            return redirect()->action('Controller@downloadWeather');
        }

        return view('index', [
            'city' => $city,
            'temp' => $temp,
            'wind' => $wind,
            'date' => $time
        ]);

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

        DB::insert("INSERT INTO weather (city, temp, date, wind) VALUES ('$city', $temp, '$time', $wind )");

        return view('index', [
            'city' => $city,
            'temp' => $temp,
            'wind' => $wind,
            'date' => $time
        ]);

    }

    public function cache()
    {
        if (Cache::has('city')) {
            echo $city = Cache::get('city');
        }
    }

    public function createCache()
    {
        $time = Carbon::now()->addSecond(1);
        Cache::put('city','Warsaw', $time);

    }

    public function getCache()

    {
        $city = Cache::get('city');
        return $city;
    }
}
