<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GraficoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Graficos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grafico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grafico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idindicador',
            'idtipografico',
            'multiplot',
            'pseudocampoidentidade',
            // 'x',
            // 'y',
            // 'z',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
