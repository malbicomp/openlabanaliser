<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddump')->textInput() ?>

    <?= $form->field($model, 'idindicadortipo')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
