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
        if (Cache::get('city') != true) {
            self::createCache();
        }

        return view('index', [
            'city' => Cache::get('city'),
            'temp' => Cache::get('temp'),
            'wind' => Cache::get('wind'),
            'date' => Cache::get('date')
            ]);
        }


    public static function createCache()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'api.openweathermap.org/data/2.5/weather?q=Warsaw,pl&lang=pl&units=metric&APPID=cec0709ff900c6d42355ce30cfb061b2');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $array = json_decode($response, true);

        $time = Carbon::now()->addHour(1);
        Cache::put('city','Warsaw', $time);
        Cache::put('temp', $array['main']['temp'],$time);
        Cache::put('wind', $array['wind']['speed'],$time);
        Cache::put('date', Carbon::now(), $time);

    }

}
