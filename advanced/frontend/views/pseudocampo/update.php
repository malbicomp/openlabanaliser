<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pseudocampo */

$this->title = 'Update Pseudocampo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pseudocampos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pseudocampo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
