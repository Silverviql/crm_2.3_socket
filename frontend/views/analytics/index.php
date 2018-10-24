<?php

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $searchModel app\models\AnalyticsSearch */
/* @var $form yii\widgets\ActiveForm */
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\NumberColumn;
use kartik\widgets\DateTimePicker;
use app\models\AnalyticsSearch;


?>

<?php $form = ActiveForm::begin([
    'method' => 'get',
]); ?>

 <?php $date_yesterday = new DateTime('-1 day');
        $model->date_from = AnalyticsSearch:: date_from;
        $model->date_from = AnalyticsSearch:: date_to;

    echo  $form->field($model, 'date_from')->widget(DateTimePicker::classname(), [
        'name' => 'datetime_10',
        'options' =>  ['placeholder' => 'Срок'],
        'convertFormat' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'startDate' => 'php Y-m-d H:i:s',
            'todayBtn' => true,
            'todayHighlight' => true,
        ]
    ]);

    echo  $form->field($model, 'date_to')->widget(DateTimePicker::classname(), [
        'name' => 'datetime_10',
        'options' =>  ['placeholder' => 'Срок'],
        'convertFormat' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'startDate' => 'php Y-m-d H:i:s',
            'todayBtn' => true,
            'todayHighlight' => true,
        ]
    ]);
=======
/* @var $searchModel app\models\ZakazSearch */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use frontend\models\NumberColumn;

/*$dataProvider = new ActiveDataProvider([
    'query' => \app\models\Zakaz::find()
        ->where('action <= 0') ->andWhere( 'date_close >= DATE_SUB(CURRENT_DATE, INTERVAL 495 DAY) AND date_close < DATE_SUB(CURRENT_DATE, INTERVAL 340 DAY)'),
    'pagination' => [
        'pageSize' => 10,
    ],
]);*/
//выборка по заказам за срок
$dataProvider = new ActiveDataProvider([
    'query' => \app\models\Zakaz::find()
        ->where('action <= 0') ->andWhere(['>=', 'date_close', '2018-09-01 00:00:00'])->andWhere(['<=', 'date_close', '2018-10-01 00:00:00']),
    'pagination' => [
        'pageSize' => 10,
    ],
]);

//выборка доставок курьера
$dataProviderCourier = new ActiveDataProvider([
    'query' => \app\models\Courier::find()
        ->where('status <= 2') ->andWhere(['>=', 'date', '2018-09-24 00:00:00'])->andWhere(['<=', 'date', '2018-10-01 00:00:00']),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
/*$dataProvider = new ActiveDataProvider([
'query' => \app\models\Zakaz::find()
->where('action <= 0') ->andWhere(['>=',  'date_close', strtotime('2017-04-01 00:00:00')])->andWhere(['<=', 'date_close', strtotime('2018-08-01 23:59:59')]),
'pagination' => [
'pageSize' => 10,
],
]);*/
?>
<div> <h1><?= Html::encode('Отчет по заказам') ?></h1>

 <?php $date_yesterday = new DateTime('-1 day');
>>>>>>> origin/master

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'showFooter' => true,
        'filterModel'=>$searchModel,
        'showPageSummary'=>false,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
<<<<<<< HEAD
        'panel'=>['type'=>'primary', 'heading'=>$date_yesterday->format('d-M')],
        'columns' => [
            [
                'attribute' => 'date_close',
            ],
            [
                'attribute' => 'id_zakaz',
            ],
            [
                'attribute' => 'description',
            ],
            [
                'attribute' => 'fact_oplata',
            ],
            [
                'attribute' => 'id_shop',
=======
        'options' => [
            'class' => 'analyticsOrderTable',
         ],
        'panel'=>['type'=>'primary', 'heading'=>'Заказы'],
        'columns' => [
            [
                'attribute' => 'date_close',
                'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'id_zakaz',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'description',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'fact_oplata',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'id_shop',
                'contentOptions' =>['style'=>'color:black;'],
>>>>>>> origin/master
                'value'=> function ($model) {
                    switch ($model->id_shop) {
                        case 2;
                            return 'Московский';
                        case 5;
                            return 'Админ';
                        case 6;
                            return 'Пушкина';
                        case 9;
                            return 'Сибирский';
                        case 12;
                            return 'Четаева';
                        case 16;
                            return 'Маркса';
                    }
                    return null;
                }
            ],
        ],
<<<<<<< HEAD
    ]);;?>
=======
    ]);;?>
    </div>
    <div>
    <h1><?= Html::encode('Отчет по курьеру') ?></h1>
       
 <?php $date_yesterday = new DateTime('-1 day');

    echo GridView::widget([
        'dataProvider' => $dataProviderCourier,
        'showFooter' => true,
        'filterModel'=>$searchModel,
        'showPageSummary'=>false,
        'options' => [
            'class' => 'analyticsCourierTable',
         ],
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Курьер'],
        'columns' => [
            [
                'attribute' => 'id_zakaz',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'date',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'to',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'from',
                 'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'status',
                 'contentOptions' =>['style'=>'color:black;'],
                'value'=> function ($model) {
                    switch ($model->status) {
                        case 0;
                            return 'На доставку';
                        case 1;
                            return 'В пути';
                        case 2;
                            return 'Доставлено';
                        case 3;
                            return 'Отказ';
                    }
                    return null;
                }
            ],
            [
                'attribute' => 'commit',
                'contentOptions' =>['style'=>'color:black;'],
            ],
            [
                'attribute' => 'delivery_time',
                'contentOptions' =>['style'=>'color:black;'],
            ],

        ],
    ]);;?>
     </div>
>>>>>>> origin/master
