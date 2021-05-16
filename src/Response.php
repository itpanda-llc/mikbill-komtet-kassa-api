<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

declare(strict_types=1);

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Response
 * @package Panda\MikBill\Komtet\KassaApi
 * Формирование ответа
 */
class Response
{
    /**
     * @param int $code Код
     * @param string $message Сообщение
     * @return string
     */
    public static function getError(int $code,
                                    string $message): string
    {
        return json_encode([Key::CODE => $code,
            Key::MESSAGE => $message]);
    }

    /**
     * @param string $message Сообщение
     * @return string
     */
    public static function getResult(string $message): string
    {
        return json_encode([Key::CODE => Code::DEFAULT,
            Key::MESSAGE => $message]);
    }
}
