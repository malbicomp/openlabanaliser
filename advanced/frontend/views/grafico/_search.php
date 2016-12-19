<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GraficoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grafico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idindicador') ?>

    <?= $form->field($model, 'idtipografico') ?>

    <?= $form->field($model, 'multiplot') ?>

    <?= $form->field($model, 'pseudocampoidentidade') ?>

    <?php // echo $form->field($model, 'x') ?>

    <?php // echo $form->field($model, 'y') ?>

    <?php // echo $form->field($model, 'z') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
