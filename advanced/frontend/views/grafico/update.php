<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grafico */

$this->title = 'Update Grafico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Graficos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grafico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
