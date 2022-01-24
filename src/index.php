<?php

$trainingRecords = [];



while (true) {
    echo '1：入力' . PHP_EOL;
    echo '2：表示' . PHP_EOL;
    echo '9：ログアウト' . PHP_EOL;
    echo 'menuを選択してください。';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        // 登録
        echo '行ったトレーニングを入力してください' . PHP_EOL;
        $date = date("Y-m-d");
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

        $trainingRecords[] = [
            'date' => $date,
            'trainingEvent' => $trainingEvent,
            'firstWeight' => $firstWeight,
            'firstRep' => $firstRep,
            'secondWeight' => $secondWeight,
            'secondRep' => $secondRep,
            'thirdWeight' => $thirdWeight,
            'thirdRep' => $thirdRep
        ];
    } elseif ($num === '2') {
        // 表示
        foreach ($trainingRecords as $trainingRecord) {
            echo '日付:' . $trainingRecord['date'] . PHP_EOL;
            echo '種目:' . $trainingRecord['trainingEvent'] . PHP_EOL;
            echo '【1セット】 重量：' . $trainingRecord['firstWeight'] . ' 回数：' . $trainingRecord['firstRep'] . PHP_EOL;
            echo '【2セット】 重量：' . $trainingRecord['secondWeight'] . ' 回数：' . $trainingRecord['secondRep'] . PHP_EOL;
            echo '【3セット】 重量：' . $trainingRecord['thirdWeight'] . ' 回数：' . $trainingRecord['thirdRep'] . PHP_EOL;
            echo '-----' . PHP_EOL;
        }
    } elseif ($num === '9') {
        // ログアウト
        break;
    }
}
