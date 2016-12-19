<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mapeamentopseudocampo */

$this->title = 'Update Mapeamentopseudocampo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mapeamentopseudocampos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mapeamentopseudocampo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
