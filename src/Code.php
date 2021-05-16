<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Code
 * @package Panda\MikBill\Komtet\KassaApi
 * Код ответа
 */
class Code
{
    /**
     * Без ошибок (Нормальный ответ)
     */
    public const DEFAULT = 0;

    /**
     * Ошибка в запросе
     */
    public const REQUEST_ERROR = 1;

    /**
     * Системная ошибка
     */
    public const SYSTEM_ERROR = 2;

    /**
     * Ошибка отладки
     */
    public const DEBUG_ERROR = 10;
}
