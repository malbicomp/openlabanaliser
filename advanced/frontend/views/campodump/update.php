<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Campodump */

$this->title = 'Atualizar Rótulos do Dump';
$this->params['breadcrumbs'][] = ['label' => 'Campodumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="campodump-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
        'qteCampos' => $qteCampos,
    ]) ?>

</div>
