<?php

require __DIR__ . '/../vendor/autoload.php';

function dbConnect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();

    $dbHost = $_ENV['DB_HOST'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];
    $dbDatabase = $_ENV['DB_DATABASE'];

    $link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
    if (!$link) {
        echo 'データベースに接続できませんでした';
        echo 'mysqli connecting error: ' . mysqli_connect_error();
    }
    return $link;
}

function dropTable($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS trainings';
    mysqli_query($link, $dropTableSql);
    echo 'データベースを削除しました' . PHP_EOL;
}
