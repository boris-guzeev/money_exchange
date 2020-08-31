<?php
/**
 * Класс контроллер конвертации
 */
namespace App\Http\Controllers;

use App\Models\Converter;
use App\Models\Rate;
use Illuminate\Http\Request;

class ConvertController extends Controller {

    /**
     * Конвертирует валюту
     * @param Request $request
     * @return string
     * @throws \ErrorException
     */
    function exchange(Request $request)
    {
        $pair = $request->input('pair');
        $sum = $request->input('sum');
        $currency = $request->input('rateTo');
        $rate = Rate::where('pair', '=', $pair)->first()->rate;

        return number_format(Converter::convert($pair, $rate, $sum, $currency), 2);
    }

    /**
     * Возвращает пары валют
     * @return Rate[]|\Illuminate\Database\Eloquent\Collection
     */
    function getpairs()
    {
        $rates = Rate::all('pair');
        return $rates;
    }
}

