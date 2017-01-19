<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campodump */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="campodump-form">
    <div>Preencha abaixo com as informações de cada coluna do Dump.</div>

    <?php $form = ActiveForm::begin(); ?>

    <?php for ($i=1; $i < $qtecampos+1; $i++) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Coluna <?= $i ?></b></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?= $form->field($model[$i], 'nome', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true, 'id' => 'campodump-nome'.$i, 'name' => 'Campodump[nome]'.$i]) ?>

                    <?= $form->field($model[$i], 'campofisicodump', ['options' => ['class' => 'col-md-6']])->textInput(['readonly' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model[$i], 'descricao', ['options' => ['class' => 'col-md-6']])->textArea(['maxlength' => true, 'id' => 'campodump-descricao'.$i, 'name' => 'Campodump[descricao]'.$i]) ?>

                    <?= $form->field($model[$i], 'tipocampo', ['options' => ['class' => 'col-md-4']])->dropDownList($model[$i]->tiposcampos, ['prompt' => 'Selecione um Tipo..', 'id' => 'campodump-tipocampo'.$i, 'name' => 'Campodump[tipocampo]'.$i])->label("<font color='#FF0000'>*</font><b>Tipo do Campo:</b>") ?>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <div class="form-group">
        <?= Html::submitButton($model[1]->isNewRecord ? 'Create' : 'Update', ['class' => $model[1]->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
