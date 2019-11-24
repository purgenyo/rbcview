<div class="row">
    <div class="col-lg-8">
        <p class="h1"><?= $model->title ?></p>
        <?php if ($model->overview): ?>
            <p class="lead"><?= $model->overview ?></p>
        <?php endif; ?>
        <!--image block start-->
        <?php
        if ($images = $model->articleImages):?>
            <hr>
            <?php foreach ($images as $image):
                ?>
                <img src="<?= $image->src ?>" class="img-responsive">
            <?php endforeach; ?>
        <?php endif;
        ?>
        <!--image block end-->
        <hr>
        <?= $model->content ?>
        <p><a href="<?=Yii::$app->request->referrer ?: Yii::$app->homeUrl?>">Назад</a></p>
    </div>
</div>