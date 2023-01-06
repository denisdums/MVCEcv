<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "db";
$DB_DATABASE = getenv("MVC_DB") ?: "database";
$DB_USER = getenv("MVC_USER") ?: "database";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "database";
$DEBUG = getenv("MVC_DEBUG") ?: true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);

