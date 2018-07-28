<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Погода</title>

        <style>
            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }
            .error {
                color: #ff0000;
                font-size: 20px;
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

            @include('layouts.header')

            <div class="content">
            @if(!empty($data))
                <div class="title">
                    Погода {{$data->city}}
                </div>
                <p>{{$data->date}}</p>
                <div class="content">
                    <p>{{$data->condition}}</p>
                    <img src="{{$data->icon}}" title="{{$data->condition}}">
                    <p>Температура: {{$data->temp}} °</p>
                    <p>Скорость ветра:  {{$data->wind_speed}} м/с</p>
                    <p>Атм. давление: {{$data->pressure_mm}} мм рт. ст.</p>
                </div>
            @else
                <p class="error">Ошибка. Перезагрузите страницу</p>
            @endif
            </div>
    </body>
</html>
