<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Shop
 * @package Panda\MikBill\Komtet\KassaApi
 * Параметры магазина
 */
class Shop
{
    /**
     * Секретный ключ
     */
    public const SECRET_KEY = '***';

    /**
     * Адрес для уведомлений об успешной фискализации
     */
    public const SUCCESS_URL = '***';

    /**
     * Адрес для уведомлений об ошибке фискализации
     */
    public const FAILURE_URL = '***';
}
