<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

declare(strict_types=1);

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Config
 * @package Panda\MikBill\Komtet\KassaApi
 * Получение конфигурации
 */
class Config
{
    /**
     * @var \SimpleXMLElement Объект конфигурационного файла
     */
    private static $sxe;

    /**
     * @return \SimpleXMLElement Объект конфигурационного файла
     */
    public static function get(): \SimpleXMLElement
    {
        if (!isset(self::$sxe))
            try {
                self::$sxe = new \SimpleXMLElement(CONFIG,
                    LIBXML_ERR_NONE,
                    true);
            } catch (\Exception $e) {
                throw new Exception\DebugException($e->getMessage());
            }

        return self::$sxe;
    }
}
