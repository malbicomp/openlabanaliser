<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dadosdump */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dadosdumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dadosdump-view">

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
            'iddumpfk',
            'campo1',
            'campo2',
            'campo3',
            'campo4',
            'campo5',
            'campo6',
            'campo7',
            'campo8',
            'campo9',
        ],
    ]) ?>

</div>
