<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Sql
 * @package Panda\MikBill\Komtet\KassaApi
 * SQL-запросы
 */
class Sql
{
    /**
     * Получение документа
     */
    public const GET_RECEIPT = "
        SELECT
            `" . Table::INT_ID . "`
        FROM
            `" . Table::NAME . "`
        WHERE
            `" . Table::CREATE_TIME . "` > DATE_SUB(
                    NOW(),
                    INTERVAL 1 WEEK
                )
                AND
            `" . Table::INT_ID . "` = " . Holder::EXTERNAL_ID . "
                AND
            `" . Table::EXT_ID . "` = " . Holder::ID . "
                AND
            `" . Table::STATE . "` != " . Holder::STATE . "
                AND
            `" . Table::STATE . "` != '" . State::DONE . "'
                AND
            `" . Table::STATE . "` != '" . State::ERROR . "'";

    /**
     * Обновление статуса документа
     */
    public const UPDATE_RECEIPT = "
        UPDATE
            `" . Table::NAME . "`
        SET
            `" . Table::STATE . "` = " . Holder::STATE . ",
            `" . Table::ERROR . "` = " . Holder::ERROR_DESCRIPTION . "
        WHERE
            `" . Table::CREATE_TIME . "` > DATE_SUB(
                    NOW(),
                    INTERVAL 1 WEEK
                )
                AND
            `" . Table::INT_ID . "` = " . Holder::EXTERNAL_ID . "
                AND
            `" . Table::EXT_ID . "` = " . Holder::ID . "
                AND
            `" . Table::STATE . "` != " . Holder::STATE . "
                AND
            `" . Table::STATE . "` != '" . State::DONE . "'
                AND
            `" . Table::STATE . "` != '" . State::ERROR . "'";
}
