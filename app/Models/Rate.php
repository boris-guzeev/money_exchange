<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс Курсы валют
 * Class Rate
 * @package App
 */
class Rate extends Model
{
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'rates';

    /**
     * Первичный ключ
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
