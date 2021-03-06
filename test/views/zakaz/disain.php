<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Otdel;
use app\models\Zakaz;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;
use yii\grid\SetColumn;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дизайнер';
?>
<?php Pjax::begin(); ?>
<?php echo Nav::widget([
    'options' => ['class' => 'nav nav-pills'],
    'items' => [
    ['label' => 'Главная', 'url' => ['zakaz/index']],
    ['label' => 'Дизайнер', 'url' => ['zakaz/disain'], 'visible' => Yii::$app->user->can('seeDisain')],
    ['label' => 'Готовые заказы', 'url' => ['zakaz/ready']],
    ],
]); ?>
<div class="zakaz-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <!-- <?php 
    Modal::begin([
    		'toggleButton' => [
    			'tag' => 'button',
    			'class' => 'btn btn-info',
    			'label' => 'Фильтр',
    		]
    	]);
    // echo $this->render('_search', ['model' => $searchModel]);
    Modal::end();
    ?> -->
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['zakaz/disain'], ['class' => 'btn btn-primary btn-lg pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'attribute' => 'id_zakaz',
                'headerOptions' => ['width' => '20'],
                'value' => 'prefics',
            ],
            [
                'attribute' => 'statusDisain',
                'class' => SetColumn::className(),
                'format' => 'raw',
                'name' => 'statusDisainName',
                'cssCLasses' => [
                    Zakaz::STATUS_DISAINER_NEW => 'primary',
                    Zakaz::STATUS_DISAINER_WORK => 'success',
                    Zakaz::STATUS_DISAINER_SOGLAS => 'info',
                ],
                'headerOptions' => ['width' => '50'],
            ],
            [
                'attribute' => 'description',
                'contentOptions' => ['style' => 'white-space: normal;'],
            ],
            [
                'attribute' => 'prioritet',
                'value' => 'prioritetName',
            ],
            [
                'attribute' => 'id_tovar',
                'value' => 'idTovar.name',
                'filter' => Zakaz::getTovarList(),
                'headerOptions' => ['width' => '100'],
            ],
            [
                'attribute' => 'srok',
                'format' => ['datetime', 'php:d.m.Y'],
                'value' => 'srok',
                'filter' => DatePicker::widget([
                     'model' => $searchModel,
                     'attribute' => 'srok',
                     'inline' => false, 
                    'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy.mm.dd'
               ],
               ]),
                'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' => 'minut',
                'headerOptions' => ['width' => '10'],
            ],
            'number',
            'img',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url,$model) {
                    return Html::a(
                    '<button class = "btn btn-primary">Открыть</button>', 
                    $url);
                },
            ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
