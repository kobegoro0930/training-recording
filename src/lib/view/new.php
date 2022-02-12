<div class="header">
    <h1 class="h2 text-dark mt-4 mb-4">Training Recording</h1>
</div>
<h2>レコードの登録</h2>
<?php if ($errors) : ?>
    <ul class="text-danger">
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<!-- 日付 -->
<div class="form-group m-4">
    <label for="date">日付</label>
    <input class="form-control" type="date" id="name" name="date" value="<?php echo $training['date']; ?>">
</div>
<!-- 種目 -->
<div class="form-group m-4">
    <label for="trainingEvent">種目</label>
    <input class="form-control" type="text" id="trainingEvent" name="trainingEvent" value="<?php echo $training['trainingEvent']; ?>">
</div>
<!-- 1set -->
<div class="m-4">
    <p class="badge badge-secondary">1set</p>
    <div class="form-row">
        <div class="col">
            <label for="firstWeight">重量</label>
            <input class="form-control" type="text" id="firstWeight" name="firstWeight" value="<?php echo $training['firstWeight']; ?>">
        </div>
        <div class="col">
            <label for="firstRep">回数</label>
            <input class="form-control" type="text" id="firstRep" name="firstRep" value="<?php echo $training['firstRep']; ?>">
        </div>
    </div>
</div>
<!-- 2set -->
<div class="m-4">
    <p class="badge badge-secondary">2set</p>
    <div class="form-row">
        <div class="col">
            <label for="secondWeight">重量</label>
            <input class="form-control" type="text" id="secondWeight" name="secondWeight" value="<?php echo $training['secondWeight']; ?>">
        </div>
        <div class="col">
            <label for="secondRep">回数</label>
            <input class="form-control" type="text" id="secondRep" name="secondRep" value="<?php echo $training['secondRep']; ?>">
        </div>
    </div>
</div>
<!-- 3set -->
<div class="m-4">
    <p class="badge badge-secondary">3set</p>
    <div class="form-row">
        <div class="col">
            <label for="thirdWeight">重量</label>
            <input class="form-control" type="text" id="thirdWeight" name="thirdWeight" value="<?php echo $training['thirdWeight']; ?>">
        </div>
        <div class="col">
            <label for="thirdRep">回数</label>
            <input class="form-control" type="text" id="thirdRep" name="thirdRep" value="<?php echo $training['thirdRep']; ?>">
        </div>
    </div>
</div>
<!-- 登録ボタン -->
<div class="m-4"><button class="btn btn-primary" type="submit">送信</button></div>
</form>
