<?php
//use \yii\helpers\Url;
//
///* @var $this yii\web\View */
//
//$this->title = 'Новостной блог';
//?>
<!--<div class="site-index">-->
<!--    <div class="body-content">-->
<?php //foreach ($news as $item) : ?>
<!--                <ul><li type="square">-->
<!--                        <p><a href="--><?//=Url::to(['site/item', 'id' => $item->id])?><!--">--><?//=$item->title?><!--</a></p>-->
<!--                </li></ul>-->
<?php //endforeach;?>
<!--    </div>-->
<!--</div>-->

<?php

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'summary' => 'Показано {count} / {totalCount} <hr>',
    'layout' => "{pager}\n{summary}\n{items}\n{pager}",
    'emptyText' => 'Нет опубликованных новостей',
    'summaryOptions' => [
        'tag' => 'span',
        'class' => 'my-summary'
    ],
]);