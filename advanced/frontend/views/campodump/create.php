<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Campodump */

$this->title = 'Create Campodump';
$this->params['breadcrumbs'][] = ['label' => 'Campodumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campodump-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
