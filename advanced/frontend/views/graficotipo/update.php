<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Graficotipo */

$this->title = 'Update Graficotipo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Graficotipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="graficotipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
