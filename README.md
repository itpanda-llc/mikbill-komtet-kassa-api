# MikBill-Komtet-Kassa-API

API для интеграции биллинговой системы ["MikBill"](https://mikbill.pro) с сервисом уведомлений ["КОМТЕТ Касса"](https://kassa.komtet.ru)

[![Packagist Downloads](https://img.shields.io/packagist/dt/itpanda-llc/mikbill-komtet-kassa-api)](https://packagist.org/packages/itpanda-llc/mikbill-komtet-kassa-api/stats)
![Packagist License](https://img.shields.io/packagist/l/itpanda-llc/mikbill-komtet-kassa-api)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/itpanda-llc/mikbill-komtet-kassa-api)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте (MikBill)](https://mikbill.pro)
* [О проекте (КОМТЕТ Касса)](https://kassa.komtet.ru)
* [Документация (MikBill)](https://wiki.mikbill.pro)
* [Документация (API КОМТЕТ Касса)](https://kassa.komtet.ru/integration/api)

## Возможности

* Получение подтверждения успешной фискализации чека
* Получение отчета об ошибке фискализации

## Требования

* PHP >= 7.2
* JSON
* libxml
* PDO
* SimpleXML

## Установка

```shell script
composer require itpanda-llc/mikbill-komtet-kassa-api
```

## Конфигурация

Указание в файлах

* Параметров магазина в ["Shop.php"](src/Shop.php)
* Путей к [конфигурационному файлу](https://wiki.mikbill.pro/billing/config_file) и интерфейсу в ["index.php"](examples/www/mikbill/admin/api/komtet/kassa/index.php), предварительно размещенного в каталоге веб-сервера

## Примеры ответов интерфейса

```json
{"code":0,"message":"Thank you for notification!"}
```

```json
{"code":1,"message":"Incorrect request"}
```
