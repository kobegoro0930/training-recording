<?php

require_once(__DIR__ . '/lib/mysqli.php');

// HTTPメソッドがpostの場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 送信されたデータを変数に格納
    $training = [
        'date' => $_POST['date'],
        'trainingEvent' => $_POST['trainingEvent'],
        'firstWeight' => $_POST['firstWeight'],
        'firstRep' => $_POST['firstRep'],
        'secondWeight' => $_POST['secondWeight'],
        'secondRep' => $_POST['secondRep'],
        'thirdWeight' => $_POST['thirdWeight'],
        'thirdRep' => $_POST['thirdRep'],
    ];
    // バリデーションを行う

    // データベースに接続
    $link = dbConnect();
    // テーブルにデータを追加
    $sql = <<<EOT
    INSERT INTO trainings (
        date,
        trainingEvent,
        firstWeight,
        firstRep,
        secondWeight,
        secondRep,
        thirdWeight,
        thirdRep
    ) VALUES (
        "{$training['date']}",
        "{$training['trainingEvent']}",
        "{$training['firstWeight']}",
        "{$training['firstRep']}",
        "{$training['secondWeight']}",
        "{$training['secondRep']}",
        "{$training['thirdWeight']}",
        "{$training['thirdRep']}"
    )
    EOT;

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo 'トレーニング記録を追加しました' . PHP_EOL;
    } else {
        echo 'データを追加できませんでした' . PHP_EOL;
        echo 'DebuggError: ' . mysqli_error($link) . PHP_EOL;
    }

    // データベースとの接続を切断する
    mysqli_close($link);
}

header("Location: index.php");
