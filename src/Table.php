<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Table
 * @package Panda\MikBill\Komtet\KassaApi
 * Параметры таблицы документов
 */
class Table
{
    /**
     * Наименование таблицы
     */
    public const NAME = '__komtet_receipts_log';

    /**
     * Наименование колонки "Время создания"
     */
    public const CREATE_TIME = 'create_time';

    /**
     * Наименование колонки "Внутренний номер"
     */
    public const INT_ID = 'int_id';

    /**
     * Наименование колонки "Внешний номер"
     */
    public const EXT_ID = 'ext_id';

    /**
     * Наименование колонки "Состояние задачи"
     */
    public const STATE = 'state';

    /**
     * Наименование колонки "Описание ошибки"
     */
    public const ERROR = 'error';
}
