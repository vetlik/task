<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h1><?=$item->title?></h1>
        <p><?=$item->text?></p>
        <a href="<?=Url::to(['site/index', ])?>">назад</a>
    </div>
</div>