<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление новостями';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <p>
        <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => ['maxButtonCount' => 5],
        'layout' => "{pager}\n{summary}\n{items}\n{pager}",
        'tableOptions' => [
            'class' => 'table table-striped table-hover'
        ],
        'columns' => [
            'title:text:Название',
            'text:text:Текст статьи',
            'image:image:Изображение',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {publish} {deactivate}',
                'buttons' => [
                    'publish' => function ($url,$model) {
                        if ($model->published == 1){
                           return '<span class="glyphicon glyphicon-ok" title="Опубликовано"></span>';
                        }else{
                            return Html::a(
                                '<span class="glyphicon glyphicon-share-alt" title="Опубликовать"></span>',
                                $url);}
                    },
                    'deactivate' => function ($url,$model) {
                        if ($model->published == 0){
                            return '<span class="glyphicon glyphicon-ok-circle" title="Деактивировано"></span>';
                        }else{
                            return Html::a(
                                '<span class="glyphicon glyphicon-remove-circle" title="Деактивировать"></span>',
                                $url);}
                    },
                ],

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
