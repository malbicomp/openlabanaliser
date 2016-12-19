<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mapeamentopseudocampo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mapeamentopseudocampos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapeamentopseudocampo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idindicador',
            'idcampodump',
            'idpseudocampo',
        ],
    ]) ?>

</div>
