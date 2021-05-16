<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Holder
 * @package Panda\MikBill\Komtet\KassaApi
 * Наименования параметров (SQL-запросы)
 */
class Holder
{
    /**
     * Идентификатор задачи
     */
    public const ID = ':id';

    /**
     * Идентификатор задачи внешний
     */
    public const EXTERNAL_ID = ':externalId';

    /**
     * Состояние задачи
     */
    public const STATE = ':state';

    /**
     * Описание ошибки
     */
    public const ERROR_DESCRIPTION = ':errorDescription';
}
