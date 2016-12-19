<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dadosdump */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dadosdump-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddumpfk')->textInput() ?>

    <?= $form->field($model, 'campo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo9')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
