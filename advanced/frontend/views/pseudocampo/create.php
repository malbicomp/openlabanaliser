<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pseudocampo */

$this->title = 'Create Pseudocampo';
$this->params['breadcrumbs'][] = ['label' => 'Pseudocampos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pseudocampo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
