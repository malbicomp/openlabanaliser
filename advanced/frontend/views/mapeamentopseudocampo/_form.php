<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mapeamentopseudocampo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mapeamentopseudocampo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idindicador')->textInput() ?>

    <?= $form->field($model, 'idcampodump')->textInput() ?>

    <?= $form->field($model, 'idpseudocampo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
