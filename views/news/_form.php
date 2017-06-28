<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
    {
        echo Html::img($model->image, ['class'=>'img-responsive']);
        echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
    }

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['id' => 'blog-form']); ?>

    <?= $form->field($model, 'title')->label('Название')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->label('Описание')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
