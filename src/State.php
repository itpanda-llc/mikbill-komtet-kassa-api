<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class State
 * @package Panda\MikBill\Komtet\KassaApi
 * Состояние задачи
 */
class State
{
    /**
     * Выполнено
     */
    public const DONE = 'done';

    /**
     * Ошибка
     */
    public const ERROR = 'error';
}
