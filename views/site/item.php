<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Просмотр новости';
?>
<div class="site-index">
    <div class="body-content">
        <h1><?=$item->title?></h1>
        <p><?=$item->text?></p>
        <a href="<?=Url::to(['site/index', ])?>">назад</a>
    </div>
</div>