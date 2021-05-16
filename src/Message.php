<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Message
 * @package Panda\MikBill\Komtet\KassaApi
 * Сообщения ответа
 */
class Message
{
    /**
     * Спасибо за уведомление! / Код: 1
     */
    public const REQUEST_OK = 'Thank you for notification!';

    /**
     * Неправильный запрос / Код: 1
     */
    public const REQUEST_ERROR = 'Incorrect request';

    /**
     * Ошибка сервера / Код: 1
     */
    public const SERVER_ERROR = 'Server error';
}
