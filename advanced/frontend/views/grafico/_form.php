<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grafico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grafico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idindicador')->textInput() ?>

    <?= $form->field($model, 'idtipografico')->textInput() ?>

    <?= $form->field($model, 'multiplot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pseudocampoidentidade')->textInput() ?>

    <?= $form->field($model, 'x')->textInput() ?>

    <?= $form->field($model, 'y')->textInput() ?>

    <?= $form->field($model, 'z')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
