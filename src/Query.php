<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

declare(strict_types=1);

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Query
 * @package Panda\MikBill\Komtet\KassaApi
 * Запросы к БД
 */
class Query
{
    /**
     * @param int $id Идентификатор задачи
     * @param string $externalId Идентификатор задачи внешний
     * @param string $state Состояние задачи
     * @return bool
     */
    public static function getReceipt(int $id,
                                      string $externalId,
                                      string $state): bool
    {
        $sth = Statement::prepare(Sql::GET_RECEIPT);

        $sth->bindParam(Holder::ID, $id, \PDO::PARAM_INT);
        $sth->bindParam(Holder::EXTERNAL_ID, $externalId);
        $sth->bindParam(Holder::STATE, $state);

        Statement::execute($sth);

        $result = $sth->fetch(\PDO::FETCH_NUM);

        return (count(($result !== false) ? $result : []) !== 0);
    }

    /**
     * @param int $id Идентификатор задачи
     * @param string $externalId Идентификатор задачи внешний
     * @param string $state Состояние задачи
     * @param string|null $errorDescription Описние ошибки
     * @return bool
     */
    public static function updateReceipt(int $id,
                                         string $externalId,
                                         string $state,
                                         ?string $errorDescription): bool
    {
        $sth = Statement::prepare(Sql::UPDATE_RECEIPT);

        $sth->bindParam(Holder::ID, $id, \PDO::PARAM_INT);
        $sth->bindParam(Holder::EXTERNAL_ID, $externalId);
        $sth->bindParam(Holder::STATE, $state);
        $sth->bindParam(Holder::ERROR_DESCRIPTION,
            $errorDescription,
            (!is_null($errorDescription))
                ? \PDO::PARAM_STR
                : \PDO::PARAM_NULL);

        Statement::execute($sth);

        return ($sth->rowCount() !== 0);
    }
}
