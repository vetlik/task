<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="news-item">
    <h3>- <a href="<?=Url::to(['site/item', 'id' => $model->id])?>"><?= Html::encode($model->title)?>...</a></h3>
</div>
