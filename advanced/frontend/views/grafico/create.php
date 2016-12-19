<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grafico */

$this->title = 'Create Grafico';
$this->params['breadcrumbs'][] = ['label' => 'Graficos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grafico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
