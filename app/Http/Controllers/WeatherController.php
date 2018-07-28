<?php
namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class WeatherController extends Controller
{

    private static $iconpath = "https://yastatic.net/weather/i/icons/islands/32/";

    private static $icon_ext = "png";


    public function weather()
    {

        $data = Weather::getWeatherData();

        if($data != false):
            $results = json_decode($data, true);
            unset($data);
            $data = $this->dataPrepareting($results);
        endif;

        return view('main', ['data' => $data]);
    }
    public function dataPrepareting($results){

        $prepare = (object)array();

        $prepare->date = date("d.m.Y, H:i", strtotime("+3 hours", $results["now"]));
        $prepare->city = $results["geo_object"]["locality"]["name"];
        $prepare->temp = $results["fact"]["temp"];
        $prepare->condition = $results["fact"]["condition"];
        $prepare->wind_speed = $results["fact"]["wind_speed"];
        $prepare->pressure_mm = $results["fact"]["pressure_mm"];
        $prepare->icon = self::$iconpath . $results["fact"]["icon"] . "." . self::$icon_ext;

        return $prepare;
    }

}