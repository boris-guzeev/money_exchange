<?php

namespace Tests\Feature;

use App\Models\Converter;
use App\Models\Rate;

use Tests\TestCase;

class ConverterTest extends TestCase
{
    /**
     * Проверим конвертацию всех присутствующий валют друг с другом
     * ожидаем всегда число
     * @return void
     * @throws \ErrorException
     */
    public function testConvert()
    {
        $rates = Rate::all();
        foreach ($rates as $rate) {
            $first = explode('/', $rate->pair)[0];
            $second = explode('/', $rate->pair)[1];
            $this->assertIsNumeric(Converter::convert($rate->pair, $rate->rate, 10000, $first));
            $this->assertIsNumeric(Converter::convert($rate->pair, $rate->rate, 10000, $second));
        }
    }

    /**
     * Проверяем выбрасывается ли исключение при ненахождении валюты
     */
    public function testConvertException()
    {
        $this->expectException(\ErrorException::class);
        $rate = Rate::find(1);
        Converter::convert($rate->pair, $rate->rate, 10000, 'test');
    }

    /**
     * Проверяем, что значения пар валют имеют требуемый формат
     */
    public function testConvertPairFormat()
    {
        $rates = Rate::all();
        foreach ($rates as $rate) {
            $array = explode('/', $rate->pair);
            $this->assertIsArray($array);
            $this->assertCount(2, $array);
        }
    }
}