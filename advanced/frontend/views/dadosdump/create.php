<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dadosdump */

$this->title = 'Create Dadosdump';
$this->params['breadcrumbs'][] = ['label' => 'Dadosdumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dadosdump-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
