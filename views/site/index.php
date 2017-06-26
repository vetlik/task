<?php
use \yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
<?php foreach ($news as $item) : ?>
                <ul><li type="square">
                        <p><a href="<?=Url::to(['site/item', 'id' => $item->id])?>"><?=$item->title?></a></p>
                </li></ul>
<?php endforeach;?>
    </div>
</div>
