<?php

function dbConnect()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
    if (!$link) {
        echo 'データベースに接続できませんでした' . PHP_EOL;
        echo 'mysqli connecting error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}

function dropTable($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS trainings';
    mysqli_query($link, $dropTableSql);
    echo 'データベースを削除しました' . PHP_EOL;
}

function createTable($link)
{
    $createTableSql = <<<EOT
    CREATE TABLE trainings (
        date DATE,
        id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
        trainingEvent VARCHAR(20),
        firstWeight INTEGER,
        firstRep INTEGER,
        secondWeight INTEGER,
        secondRep INTEGER,
        thirdWeight INTEGER,
        thirdRep  INTEGER
      ) DEFAULT CHARACTER SET=utf8mb4;
    EOT;
    $result = mysqli_query($link, $createTableSql);
    if ($result) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo 'テーブルを作成できませんでした' . PHP_EOL;
        echo 'mysql create table error: ' . mysqli_error($link) . PHP_EOL;
    }
}

// データベースに接続
$link = dbConnect();

// データベースを削除
dropTable($link);

// データベースを作成
createTable($link);

// データベースから切断
mysqli_close($link);
