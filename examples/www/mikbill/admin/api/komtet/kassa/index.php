<?php

/**
 * Файл из репозитория MikBill-Komtet-Kassa-API
 * @link https://github.com/itpanda-llc/mikbill-komtet-kassa-api
 */

declare(strict_types=1);

/**
 * Путь к конфигурационному файлу MikBill
 * @link https://wiki.mikbill.pro/billing/config_file
 */
const CONFIG =  '/var/www/mikbill/admin/app/etc/config.xml';

require_once '/var/mikbill/__ext/vendor/autoload.php';

use Panda\MikBill\Komtet\KassaApi;

header(KassaApi\Content::APPLICATION_JSON);

$logic = new KassaApi\Logic;

try {
    $logic->run();

    header($logic->status);
    print_r($logic->content);
} catch (KassaApi\Exception\SystemException $e) {
    header(KassaApi\Status::INTERNAL_500);
    print_r(KassaApi\Response::getError(KassaApi\Code::SYSTEM_ERROR,
        $e->getMessage()));
} catch (KassaApi\Exception\DebugException $e) {
    header(KassaApi\Status::INTERNAL_500);
    print_r(KassaApi\Response::getError(KassaApi\Code::DEBUG_ERROR,
        $e->getMessage()));
}
