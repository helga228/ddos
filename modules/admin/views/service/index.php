<?php

use app\models\Service;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    Modal::begin([
        'title'=>'<h4>Wait a bit...</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'type',
            'ip',
            'domain',
            [
                'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Service $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                     }

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
