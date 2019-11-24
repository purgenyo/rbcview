<div class="container">
<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => \app\models\Article::instance()->getSearchProvider(),
    'itemView' => '_article_list_part',
]);
?>
</div>
