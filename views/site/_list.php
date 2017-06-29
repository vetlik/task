<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="news-item">
    <h4 class="text-justify"><?= Html::encode($model->title)?> <img src="">
        <a href="<?=Url::to(['site/item', 'id' => $model->id])?>">
            <small><?=\app\controllers\smart_cut(Html::encode($model->text), 5)?>...</small>
        </a></h4>
</div>
