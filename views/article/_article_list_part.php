<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-lg-8">
        <p class="h1">
            <a href="<?=Url::toRoute(['article/view', 'id' => $model->id]);?>">
                <?= $model->title ?>
            </a>
        </p>
        <?php if ($model->overview): ?>
            <p class="lead"><?= $model->overview ?></p>
        <?php endif; ?>
        <hr>
        <?= $model->small_content ?>..<a href="<?=Url::toRoute(['site/view', 'id' => $model->id]);?>">подробнее</a>
    </div>
</div>