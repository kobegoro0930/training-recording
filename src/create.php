<?php

require_once(__DIR__ . '/lib/mysqli.php');

function validate($training)
{
    $errors = [];

    $dates = explode('-', $training['date']);
    if (!strlen($training['date'])) {
        $errors['date'] = '日付を入力してください';
    } elseif (!checkdate($date[1], $date[2], $date[0])) {
        $errors['date'] = '日付を正しい形式で入力してください';
    }
    if (!strlen($training['trainingEvent'])) {
        $errors['trainingEvent'] = '種目を入力してください';
    } elseif (strlen($training['trainingEvent']) > 100) {
        $errors['trainingEvent'] = '種目を100文字以内で入力してください';
    }
    if ($training['firstWeight'] < 1 || $training['firstWeight'] > 200) {
        $errors['firstWeight'] = '1setの重量を1~200以内の整数で入力してください';
    }
    if ($training['firstRep'] < 1 || $training['firstRep'] > 200) {
        $errors['firstRep'] = '1setの回数を1~200以内の整数で入力してください';
    }
    if ($training['secondWeight'] < 1 || $training['secondWeight'] > 200) {
        $errors['secondWeight'] = '2setの重量を1~200以内の整数で入力してください';
    }
    if ($training['secondRep'] < 1 || $training['secondRep'] > 200) {
        $errors['secondRep'] = '2setの回数を1~200以内の整数で入力してください';
    }
    if ($training['thirdWeight'] < 1 || $training['thirdWeight'] > 200) {
        $errors['thirdWeight'] = '3setの重量を1~200以内の整数で入力してください';
    }
    if ($training['thirdRep'] < 1 || $training['thirdRep'] > 200) {
        $errors['thirdRep'] = '3setの回数を1~200以内の整数で入力してください';
    }

    return $errors;
}

// HTTPメソッドがpostの場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 送信されたデータを変数に格納
    $training = [
        'date' => $_POST['date'],
        'trainingEvent' => $_POST['trainingEvent'],
        'firstWeight' => (int) $_POST['firstWeight'],
        'firstRep' => (int) $_POST['firstRep'],
        'secondWeight' => (int) $_POST['secondWeight'],
        'secondRep' => (int) $_POST['secondRep'],
        'thirdWeight' => (int) $_POST['thirdWeight'],
        'thirdRep' => (int) $_POST['thirdRep']
    ];
    // バリデーションを行う
    $errors = validate($training);
    if (count($errors) === 0) {
        // 正常処理
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

        if (!$result) {
            error_log('Error: fail to create training');
            error_log('DebuggingError: ' . mysqli_error($link));
        }

        // データベースとの接続を切断する
        mysqli_close($link);

        // 一覧ページに遷移
        header("Location: index.php");
    } else {
        // バリデーションエラーを表示
        var_dump($errors);
    }
}
