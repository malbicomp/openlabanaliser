<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mapeamentopseudocampo */

$this->title = 'Create Mapeamentopseudocampo';
$this->params['breadcrumbs'][] = ['label' => 'Mapeamentopseudocampos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapeamentopseudocampo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
