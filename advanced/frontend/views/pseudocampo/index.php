<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PseudocampoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pseudocampos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pseudocampo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pseudocampo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idindicadortipo',
            'nome',
            'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
