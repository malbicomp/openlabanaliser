<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indicadortipo */

$this->title = 'Create Indicadortipo';
$this->params['breadcrumbs'][] = ['label' => 'Indicadortipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicadortipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
