<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campodump */
/* @var $form yii\widgets\ActiveForm */

$tipoCampos = ['1' => 'String', '2' => 'Integer']

?>

<div class="campodump-form">

    <?php $form = ActiveForm::begin(); ?>


	<?php for ($i=1; $i < $qteCampos+1; $i++) { ?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title"><b>Coluna <?= $i ?></b></h3>
	        </div>
	        <div class="panel-body">
	            <div class="col-md-12">
	                <?= $form->field($models[$i], '['.$i.']nome', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

	                <?= $form->field($models[$i], '['.$i.']campofisicodump', ['options' => ['class' => 'col-md-4']])->textInput(['readonly' => true]) ?>
	            </div>
	            <div class="col-md-12">
	                <?= $form->field($models[$i], '['.$i.']descricao', ['options' => ['class' => 'col-md-6']])->textArea(['maxlength' => true]) ?>

	                <?= $form->field($models[$i], '['.$i.']tipoCampo', ['options' => ['class' => 'col-md-4']])->dropDownList($tipoCampos, ['prompt' => 'Selecione um Tipo..'])->label("<font color='#FF0000'>*</font><b>Tipo do Campo:</b>") ?>
	            </div>
	        </div>
	    </div>
	<?php } ?>
    <div class="form-group">
        <?= Html::submitButton($models[1]->isNewRecord ? 'Create' : 'Update', ['class' => $models[1]->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
