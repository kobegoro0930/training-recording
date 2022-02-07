<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面｜[Training Recording]</title>
</head>

<body>
    <div class="header">
        <h1>Training Recording</h1>
    </div>
    <h2>レコードの登録</h2>
    <form action="/create.php" method="post">
        <?php if ($errors) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!-- 日付 -->
        <div>
            <label for="date">日付</label>
            <input type="date" id="name" name="date" value="<?php echo $training['date']; ?>">
        </div>
        <!-- 種目 -->
        <div>
            <label for="trainingEvent">種目</label>
            <input type="text" id="trainingEvent" name="trainingEvent" value="<?php echo $training['trainingEvent']; ?>">
        </div>
        <!-- 1set -->
        <div>
            <p>1set</p>
            <label for="firstWeight">重量</label>
            <input type="text" id="firstWeight" name="firstWeight" value="<?php echo $training['firstWeight']; ?>">
            <label for="firstRep">回数</label>
            <input type="text" id="firstRep" name="firstRep" value="<?php echo $training['firstRep']; ?>">
        </div>
        <!-- 2set -->
        <div>
            <p>2set</p>
            <label for="secondWeight">重量</label>
            <input type="text" id="secondWeight" name="secondWeight" value="<?php echo $training['secondWeight']; ?>">
            <label for="secondRep">回数</label>
            <input type="text" id="secondRep" name="secondRep" value="<?php echo $training['secondRep']; ?>">
        </div>
        <!-- 3set -->
        <div>
            <p>3set</p>
            <label for="thirdWeight">重量</label>
            <input type="text" id="thirdWeight" name="thirdWeight" value="<?php echo $training['thirdWeight']; ?>">
            <label for="thirdRep">回数</label>
            <input type="text" id="thirdRep" name="thirdRep" value="<?php echo $training['thirdRep']; ?>">
        </div>
        <!-- 登録ボタン -->
        <div>
            <button type="submit">送信</button>
        </div>
    </form>
</body>

</html>
