<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use frontend\models\NumberColumn;

$dataProvider = new ActiveDataProvider([
    'query' => \app\models\Cashbox::find()
        ->where('id'),
    'pagination' => [
        'pageSize' => 10,
    ],
]);

$this->title = 'Отчет по кассам';

?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'showFooter' => true,
    'filterModel'=>$searchModel,
    'showPageSummary'=>false,
    'pjax'=>true,
    'striped'=>true,
    'hover'=>true,
<<<<<<< HEAD
=======
     'options' => [
            'class' => 'analyticsOrderTable',
         ],
>>>>>>> origin/master
    'panel'=>['type'=>'primary', 'heading'=>'Отчет'],
    'columns' => [
        [
            'attribute' => 'date',
<<<<<<< HEAD
        ],
        [
            'attribute' => 'name',
        ],
        [
            'attribute' => 'surname',
        ],
        [
            'attribute' => 'shop',
        ],
        [
            'attribute' => 'cash_on_cashbox',
        ],
        [
            'attribute' => 'cash_on_check',
        ],
        [
            'attribute' => 'non_cash',
        ],
        [
            'attribute' => 'payment_from_cashbox',
        ],
        [
            'attribute' => 'to_which_payment',
        ],
        [
            'attribute' => 'refunds',
        ],
        [
            'attribute' => 'balance_in_cashbox',
        ],
        [
            'attribute' => 'attendance',
=======
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'name',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'surname',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'shop',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'cash_on_cashbox',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'cash_on_check',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'non_cash',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'payment_from_cashbox',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'to_which_payment',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'refunds',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'balance_in_cashbox',
            'contentOptions' =>['style'=>'color:black;'],
        ],
        [
            'attribute' => 'attendance',
            'contentOptions' =>['style'=>'color:black;'],
>>>>>>> origin/master
        ],
    ],
]);;?>
