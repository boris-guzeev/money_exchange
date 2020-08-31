<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.08.2020
 */

namespace App\Http\Controllers;

/**
 * Класс отвечает за действия на главной странице приложения
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * Отображение главной страницы
     */
    function index()
    {
        return \view('index', []);
    }
}