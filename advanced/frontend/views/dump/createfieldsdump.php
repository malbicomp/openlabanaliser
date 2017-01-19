<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Campodump */

$this->title = 'Etapa 2 - Registrar Campos do Dump';
$this->params['breadcrumbs'][] = ['label' => 'Dumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campodump-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formfieldsdump', [
        'model' => $model,
        'qtecampos' => $qtecampos,
    ]) ?>

</div>
