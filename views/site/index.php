<?php

use yii\widgets\ListView;
$this->title = 'Новостной блог';
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => ['maxButtonCount' => 5],
    'layout' => "{pager}\n{summary}\n{items}\n{pager}",
    'itemView' => '_list',
    'emptyText' => 'Нет опубликованных новостей',
]);
