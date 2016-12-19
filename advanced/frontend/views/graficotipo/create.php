<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Graficotipo */

$this->title = 'Create Graficotipo';
$this->params['breadcrumbs'][] = ['label' => 'Graficotipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graficotipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
