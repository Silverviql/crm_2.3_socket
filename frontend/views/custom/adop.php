<?php

use yii\bootstrap\ButtonDropdown;
<<<<<<< HEAD
use yii\bootstrap\Modal;
=======
>>>>>>> origin/master
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use unclead\multipleinput\TabularInput;
<<<<<<< HEAD
use yii\helpers\Url;
=======
>>>>>>> origin/master

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все запросы';?>
<div class="custom-index">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation'      => true,
        'enableClientValidation'    => false,
        'validateOnChange'          => false,
        'validateOnSubmit'          => true,
        'validateOnBlur'            => false,
    ]); ?>
    <div id="customForm">

        <?=
        TabularInput::widget([
            'models' => $models,
            'columns' => [
                [
                    'name' => 'tovar',
                    'type' => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
                    'title' => 'Товар',
                    'options' => [
                        'maxlength' => '50',
                        'placeholder' => 'Максимальное значение должно быть не больше 50 символов',
                    ]
                ],
                [
                    'name' => 'number',
                    'type' => 'textInput',
                    'title' => 'Кол-во',
                    'options' => [
                        'type' => 'number',
                        'min' => '0'
                    ]
                ],
            ],
        ]) ?>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<<<<<<< HEAD
    <p>
=======
>>>>>>> origin/master
    <div class="button-dropmenu">
        <?php echo ButtonDropdown::widget([
            'label' => '+',
            'options' => [
                'class' => 'btn buttonAdd',
            ],
            'dropdown' => [
                'items' => [
                    [
                        'label' => 'Заказ',
<<<<<<< HEAD
                        'url' => '#',
                        'visible' => Yii::$app->user->can('seeAdop'),
                        'options' => [
                            'class' => 'modalZakazcreate-button',
                            'value' => Url::to(['zakaz/create']),
                            'id' => $model->id_zakaz,
                            'onclick' => 'return false'
                        ]
=======
                        'url' => ['zakaz/create'],
                        'visible' => Yii::$app->user->can('seeAdop')
>>>>>>> origin/master
                    ],
                    [
                        'label' => '',
                        'options' => [
                            'role' => 'presentation',
                            'class' => 'divider'
                        ]
                    ],
                    [
                        'label' => 'Закупки',
                        'url' => 'create'
                    ],
                    [
                        'label' => '',
                        'options' => [
                            'role' => 'presentation',
                            'class' => 'divider'
                        ]
                    ],
                    [
                        'label' => 'Поломки',
                        'url' => ['helpdesk/create']
                    ],
                    [
                        'label' => '',
                        'options' => [
                            'role' => 'presentation',
                            'class' => 'divider'
                        ]
                    ],
                    [
                        'label' => 'Задачи',
                        'url' => ['todoist/create'],
                        'visible' => Yii::$app->user->can('admin'),
                    ],
                ]
            ]
        ]); ?>
    </div>
<<<<<<< HEAD
    </p>
=======
>>>>>>> origin/master

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
        'striped' => false,
        'rowOptions' => ['class' => 'trTable srok trNormal'],
        'columns' => [
            [
				'attribute' => 'date',
				'format' => ['datetime', 'php:d M H:m'],
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'border-left textTr tr90', 'style' => 'border:none'],
			],
            [
                'attribute' => 'tovar',
                'contentOptions'=>['style'=>'white-space: normal;'],
            ],
            [
                'attribute' => 'number',
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr50'],
                'value' => function($model){
                    return $model->number == null ? '' : $model->number;
                }
            ],
            [
                'attribute' => 'action',
                'value' => function($model){
                    return $model->action == 0 ? 'В процессе' : 'Привезен';
                },
                'contentOptions' => ['class' => 'border-right textTr tr90'],
            ],
//            [
//                'header' => 'Действие',
//                'format' => 'raw',
//                'value' => function($model){
//                    return $model->action == 0 ? Html::a('Привезен', ['brought', 'id' => $model->id]) : '';
//                }
//            ],
        ],
    ]); ?>
</div>
<<<<<<< HEAD
<?php Modal::begin([
    'id' => 'modalZakazcreate',
    'header' => '<h2>Создание заказа</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
=======
>>>>>>> origin/master
