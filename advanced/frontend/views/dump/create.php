<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dump */

$this->title = 'Adicionar Dump';
$this->params['breadcrumbs'][] = ['label' => 'Dumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dump-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
