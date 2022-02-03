<?php

require __DIR__ . '/vendor/autoload.php';

function dbConnect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    $dbHost = $_ENV['DB_HOST'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];
    $dbDatabase = $_ENV['DB_DATABASE'];

    $link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
    if ($link) {
        echo 'データベースに接続しました' . PHP_EOL;
        return $link;
    } else {
        echo 'データベースに接続できませんでした';
        echo 'mysqli connecting error: ' . mysqli_connect_error();
    }
}

function createRecord($link)
{
    echo '行ったトレーニングを入力してください' . PHP_EOL;
    echo '種目： ';
    $trainingEvent = trim(fgets(STDIN));
    echo '1セット目の重量： ';
    $firstWeight = trim(fgets(STDIN));
    echo '1セット目の回数： ';
    $firstRep = trim(fgets(STDIN));
    echo '2セット目の重量： ';
    $secondWeight = trim(fgets(STDIN));
    echo '2セット目の回数： ';
    $secondRep = trim(fgets(STDIN));
    echo '3セット目の重量： ';
    $thirdWeight = trim(fgets(STDIN));
    echo '3セット目の重量： ';
    $thirdRep = trim(fgets(STDIN));

    $sql = <<<EOT
    INSERT INTO trainings (
        trainingEvent,
        firstWeight,
        firstRep,
        secondWeight,
        secondRep,
        thirdWeight,
        thirdRep
    ) VALUES (
        "{$trainingEvent}",
        "{$firstWeight}",
        "{$firstRep}",
        "{$secondWeight}",
        "{$secondRep}",
        "{$thirdWeight}",
        "{$thirdRep}"
    )
    EOT;

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo 'トレーニング記録を追加しました' . PHP_EOL;
    } else {
        echo 'データを追加できませんでした' . PHP_EOL;
        echo 'DebbuggError: ' . mysqli_error($result) . PHP_EOL;
    }
}

function displayRecord($link)
{
    $sql = <<<EOT
    SELECT date, trainingEvent, firstWeight, firstRep, secondWeight,secondRep, thirdWeight, thirdRep FROM trainings
    EOT;

    $result = mysqli_query($link, $sqls);

    if ($result) {
        while ($trainingRecord = mysqli_fetch_assoc($result)) {
            echo '日付:' . $trainingRecord['date'] . PHP_EOL;
            echo '種目:' . $trainingRecord['trainingEvent'] . PHP_EOL;
            echo '【1セット】 重量：' . $trainingRecord['firstWeight'] . ' 回数：' . $trainingRecord['firstRep'] . PHP_EOL;
            echo '【2セット】 重量：' . $trainingRecord['secondWeight'] . ' 回数：' . $trainingRecord['secondRep'] . PHP_EOL;
            echo '【3セット】 重量：' . $trainingRecord['thirdWeight'] . ' 回数：' . $trainingRecord['thirdRep'] . PHP_EOL;
            echo '-----' . PHP_EOL;
        }
    } else {
        echo 'データを表示できませんでした' . PHP_EOL;
    }
}

$link = dbConnect();

$trainingRecords = [];

while (true) {
    echo '1：入力' . PHP_EOL;
    echo '2：表示' . PHP_EOL;
    echo '9：ログアウト' . PHP_EOL;
    echo 'menuを選択してください。';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        // 登録
        createRecord($link);
    } elseif ($num === '2') {
        // 表示
        displayRecord($link);
    } elseif ($num === '9') {
        // ログアウト
        break;
    }
}
