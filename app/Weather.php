<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{

    private static $uuid = "8211637137c4408898aceb1097921872";

    private static $deviceid = "315f0e802b0b49eb8404ea8056abeaaf";

    private static $part     = "eternalsun";

    private static $geoid    = 191; //213 Москва, 191 Брянск

    private static $lang     = "ru";


    public static function getWeatherData()
    {
        $timestamp = time();

        $token = md5(self::$part . $timestamp);

        $client = new Client();

        try{
            $res = $client->get("https://api.weather.yandex.ru/v1/forecast?geoid=".self::$geoid."&locality=".self::$lang ,
                [
                    'headers' => [
                        "User-Agent: yandex-weather-android/4.2.1\n" .
                        "X-Yandex-Weather-Client: YandexWeatherAndroid/4.2.1\n" .
                        "X-Yandex-Weather-Device: os=null;os_version=21;manufacturer=chromium;model=App Runtime for Chrome Dev;device_id=" . self::$deviceid . ";uuid=" . self::$uuid . ";\n" .
                        "X-Yandex-Weather-Token: $token\n" .
                        "X-Yandex-Weather-Timestamp: $timestamp\n" .
                        "X-Yandex-Weather-UUID: " . self::$uuid . "\n" .
                        "X-Yandex-Weather-Device-ID: " . self::$deviceid . "\n" .
                        "Accept-Encoding: gzip, deflate\n" .
                        "Host: api.weather.yandex.ru\n" .
                        "Connection: Keep-Alive"
                    ]
                ],
                array(),
                array('http_errors' => false)
            );
        }
        catch (ClientException $e) {
            return false;
        }

        return $res->getBody();
    }

}
