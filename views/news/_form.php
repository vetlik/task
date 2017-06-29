<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['id' => 'blog-form','options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->label('Название')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->label('Описание')->textarea(['maxlength' => true]) ?>
    <div class="form-group">
            <?php if ($images = $model->getImages()):?>
            <? foreach ($images as $image):
                    $id = $model->id.'-'.$image->id;
                ?>
                     <a href="<?=Url::to(['news/deleteimg', 'id' => $id])?>"> <img src="<?=$image->getUrl('x200')?>" ></a>
            <? endforeach?>
            <?php endif;?>
    </div>
    <?= $form->field($model, 'image')->label('Прикрепите изображение')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Применить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
