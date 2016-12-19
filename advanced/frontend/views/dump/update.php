<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dump */

$this->title = 'Update Dump: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dump-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
