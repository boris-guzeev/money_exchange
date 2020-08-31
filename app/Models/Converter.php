<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31.08.2020
 */

namespace App\Models;

/**
 * Класс конвертации валют
 * Class Converter
 * @package App\Http
 */
class Converter
{
    /**
     * Конвертирует валюту
     * @param $pair <p>Пара валют</p>
     * @param $rate <p>курс</p>
     * @param $sum <p>сумма для перевода</p>
     * @param $currency <p>в какую валюту делать конвертацию</p>
     *
     * @return integer | float
     * @throws \ErrorException
     */
    public static function convert($pair, $rate, $sum, $currency)
    {
        $pair = explode('/', $pair);
        if ($pair[0] == $currency) {
            return $sum / $rate;
        } else if ($pair[1] == $currency){
            return $rate * $sum;
        } else {
            throw new \ErrorException('Corrency is not found!');
        }
    }
}