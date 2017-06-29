<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Просмотр новости';
?>
<div class="site-index">
    <div class="body-content">
        <?php
        if ($images = $item->getImages()):?>
            <? foreach ($images as $image):

                ?>
                <img src="<?=$image->getUrl('x300')?>" class="img-circle">
            <? endforeach?>
        <?php endif;?>
        <h1><?=$item->title?></h1>
        <p><?=$item->text?></p>
    </div>
    <a href="<?=Url::to(['site/index', ])?>">назад</a>
</div>
