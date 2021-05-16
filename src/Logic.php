<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

declare(strict_types=1);

namespace Panda\MikBill\Komtet\KassaApi;

/**
 * Class Logic
 * @package Panda\MikBill\Komtet\KassaApi
 * Проверка запроса и формирование ответа
 */
class Logic
{
    /**
     * @var string|null
     */
    private $body;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $errorDescription;

    /**
     * @var string Заголовок (HTTP-статус)
     */
    public $status = Status::OK_200;

    /**
     * @var string|null Контент
     */
    public $content;

    public function __construct()
    {
        $this->body = file_get_contents('php://input');

        $j = json_decode($this->body);

        $this->id = $j->{Param::ID} ?? null;
        $this->externalId = $j->{Param::EXTERNAL_ID} ?? null;
        $this->state = $j->{Param::STATE} ?? null;
        $this->errorDescription =
            $j->{Param::ERROR_DESCRIPTION} ?? null;
    }

    public function run(): void
    {
        if (($_SERVER['HTTP_X_HMAC_SIGNATURE'] !==
                hash_hmac('md5',
                    sprintf('POST%s%s', Shop::SUCCESS_URL, $this->body),
                    Shop::SECRET_KEY))
            && ($_SERVER['HTTP_X_HMAC_SIGNATURE'] !==
                hash_hmac('md5',
                    sprintf('POST%s%s', Shop::FAILURE_URL, $this->body),
                    Shop::SECRET_KEY)))
        {
            $this->status = Status::UNAUTHORIZED_401;
            $this->content = Response::getError(Code::REQUEST_ERROR,
                Message::REQUEST_ERROR);

            return;
        }

        if ((is_null($this->id))
            || (is_null($this->externalId))
            || (is_null($this->state)))
        {
            $this->status = Status::BAD_REQUEST_400;
            $this->content = Response::getError(Code::REQUEST_ERROR,
                Message::REQUEST_ERROR);

            return;
        }

        if (!Query::getReceipt($this->id,
            $this->externalId,
            $this->state))
        {
            $this->content = Response::getResult(Message::REQUEST_OK);

            return;
        }

        if (!Query::updateReceipt($this->id,
            $this->externalId,
            $this->state,
            $this->errorDescription))
        {
            $this->status = Status::INTERNAL_500;
            $this->content = Response::getError(Code::SYSTEM_ERROR,
                Message::SERVER_ERROR);
        } else
            $this->content = Response::getResult(Message::REQUEST_OK);
    }
}
