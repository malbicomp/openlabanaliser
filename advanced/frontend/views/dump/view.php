<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dump */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Dumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dump-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['Atualizar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Remover Dump', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja remover este dump e os dados relacionados a ele?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'descricao',
            [
             'attribute' => 'campodumps',
             'format'=>'raw',
             'value'=> count($model->campodumps)
            ],
            [
             'attribute' => 'dadosdump',
             'format'=>'raw',
             'value'=> count($model->dadosdumps)
            ],
        ],
    ]) ?>

</div>
