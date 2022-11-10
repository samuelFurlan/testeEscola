<?php

const URL_BASE = "http://localhost/testeEscola";

const SITE = "Escola Grupo Well";


const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "db_escolateste",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];

function url(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }
    return URL_BASE;
}

function url_views(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/Views/{$uri}";
    }
    return URL_BASE;
}
