<?php

use app\models\Comment;
<<<<<<< HEAD
use app\models\Zakaz;
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\widgets\Pjax;
=======
use yii\bootstrap\Nav;
use yii\helpers\StringHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\Zakaz;
use yii\bootstrap\ButtonDropdown;
>>>>>>> origin/master

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderExecute yii\data\ActiveDataProvider */

$this->title = 'ВСЕ ЗАКАЗЫ';
?>
<?php Pjax::begin(); ?>

<<<<<<< HEAD
<div class="zakaz-index">
    <div class="button-dropmenu">
=======
<div class="zakaz-shop">
<div class="button-dropmenu">
>>>>>>> origin/master
    <?php echo ButtonDropdown::widget([
        'label' => '+',
        'options' => [
            'class' => 'btn buttonAdd',
        ],
        'dropdown' => [
            'items' => [
                [
                    'label' => 'Заказ',
                    'url' => 'zakaz/create',
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
                    'url' => 'custom/create'
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
                    'url' => 'helpdesk/create'
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
//                            'visible' => Yii::$app->user->can('admin'),
                ],
            ]
        ]
    ]); ?>
    </div>
<<<<<<< HEAD
    <div class="col-lg-5 zakazSearch">
        <?php echo $this->render('_search', ['model' => $searchModel]);?>
    </div>
    <div class="col-lg-7 shopZakaz">
        <h3 class="titleTable">Исполнено</h3>
    </div>
    <div class="col-xs-12 orderList">
=======
    <div class="col-lg-3 zakazSearch">
        <?php echo $this->render('_search', ['model' => $searchModel]);?>
    </div>
    <div class="col-lg-9 shopZakaz">
        <h3 class="titleTable">Исполнено</h3>
    </div>
    <div class="col-xs-12 ispolShop">
>>>>>>> origin/master
        <?= GridView::widget([
            'dataProvider' => $dataProviderExecute,
            'floatHeader' => true,
            'headerRowOptions' => ['class' => 'headerTable'],
            'pjax' => true,
<<<<<<< HEAD
            'id'=> 10,
            'striped' => false,
            'tableOptions' => ['class' => 'table table-bordered tableSize'],
            'rowOptions' => function($model){
               if ( $model->statusUpdate  == Zakaz::STATUS_UPDATE_ADMIN){
                    return['class' => 'trTable bold trSrok trNewUpdate'];
                } else {
                    return ['class' => 'trTable srok trNormal'];
                }
            },
=======
            'striped' => false,
            'tableOptions' => ['class' => 'table table-bordered tableSize'],
            'rowOptions' => ['class' => 'trTable srok trNormal'],
>>>>>>> origin/master
            'columns' => [
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'contentOptions' => function($model){
                        return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                    },
                    'width'=>'10px',
                    'value' => function () {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail'=>function ($model) {
                        $comment = new Comment();
                        return Yii::$app->controller->renderPartial('_zakaz', ['model'=>$model, 'comment' => $comment]);
                    },
                    'enableRowClick' => true,
                    'expandOneOnly' => true,
                    'expandIcon' => ' ',
                    'collapseIcon' => ' ',
                ],
                [
                    'attribute' => 'id_zakaz',
                    'value' => 'prefics',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => ['class' => 'textTr tr70'],
                ],
                 [
                'attribute' => '',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr20'],
                'value' => function($model){
                    if ($model->prioritet == 2) {
<<<<<<< HEAD
                            return '<i class="fa fa-circle fa-red"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-exclamation-triangle fa-ping"></i>';
=======
                            return '<i class="fa fa-circle fa-red" aria-hidden="true" title="Важно/Брак в заказе"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-exclamation-triangle fa-ping" aria-hidden="true" title="Очень важно"></i>';
>>>>>>> origin/master
                    } else {
                        return '';
                    }

                }
            ],
                [
                    'attribute' => 'srok',
                    'format' => ['datetime', 'php:d M H:i'],
                    'value' => 'srok',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => ['class' => 'textTr tr100 srok'],
                ],
                [
                    'attribute' => 'minut',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => ['class' => 'textTr tr10'],
                    'value' => function($model){
                        if ($model->minut == null){
                            return '';
                        } else {
                            return $model->minut;
                        }
                    }
                ],
                [
                    'attribute' => 'description',
                    'value' => function($model){
                        return StringHelper::truncate($model->description, 100);
<<<<<<< HEAD
                    },
                    'contentOptions' => ['class' => 'textTr'],
                ],
                [
=======
                    }
                ],
                [
                 'attribute' => 'interior',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr50'],
                'value' =>  function($model){
                    if ($model->interior == 1) {
                        return '<i class="iconHolland" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true" title="Внутренний заказ"></i>';
                        }else {
                              return '';
                        }
                    }
                 ],
                [
>>>>>>> origin/master
                    'attribute' => 'oplata',
                    'value' => 'money',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => ['class' => 'textTr tr70'],
                ],
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'value' => function($model){
                        if ($model->status == Zakaz::STATUS_EXECUTE){
                            return Html::a('Готово', ['close', 'id' => $model->id_zakaz]);
                        } else {
                            return '';
                        }
                    },
                    'contentOptions' => ['class' => 'textTr border-right tr70'],
                ]
            ],
        ]); ?>
    </div>
    <div class="col-lg-12">
        <h3 class="titleTable">В работе</h3>
    </div>
    <div class="col-xs-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
<<<<<<< HEAD
        'id'=> 11,
        'striped' => false,
        'tableOptions' => ['class' => 'table table-bordered tableSize'],
        'rowOptions' => function($model){
            if ( $model->statusUpdate  == Zakaz::STATUS_UPDATE_ADMIN){
                return['class' => 'trTable bold trSrok trNewUpdate'];
            } else {
                return ['class' => 'trTable srok trNormal'];
            }
        },
=======
        'striped' => false,
        'tableOptions' => ['class' => 'table table-bordered tableSize'],
        'rowOptions' => ['class' => 'trTable srok trNormal'],
>>>>>>> origin/master
        'columns' => [
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'contentOptions' => function($model){
                    return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                },
                'width'=>'10px',
                'value' => function () {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model) {
                    $comment = new Comment();
                    return Yii::$app->controller->renderPartial('_zakaz', ['model'=>$model, 'comment' => $comment]);
                },
                'enableRowClick' => true,
                'expandOneOnly' => true,
                'expandIcon' => ' ',
                'collapseIcon' => ' ',
            ],
            [
                'attribute' => 'id_zakaz',
                'value' => 'prefics',
                'hAlign' => GridView::ALIGN_RIGHT,
<<<<<<< HEAD
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => 'tr70'];
                    } else {
                        return ['class' => 'textTr tr70'];
                    }
                },
=======
                'contentOptions' => ['class' => 'textTr tr70'],
>>>>>>> origin/master
            ],
             [
                'attribute' => '',
                'format' => 'raw',
<<<<<<< HEAD
                 'contentOptions' => function($model) {
                     if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                         return ['class' => 'tr20'];
                     } else {
                         return ['class' => 'textTr tr20'];
                     }
                 },
                'value' => function($model){
                    if ($model->prioritet == 2) {
                            return '<i class="fa fa-circle fa-red"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-exclamation-triangle fa-ping"></i>';
=======
                'contentOptions' => ['class' => 'tr20'],
                'value' => function($model){
                    if ($model->prioritet == 2) {
                            return '<i class="fa fa-circle fa-red" aria-hidden="true" title="Важно/Брак в заказе"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-exclamation-triangle fa-ping" aria-hidden="true" title="Очень важно"></i>';
>>>>>>> origin/master
                    } else {
                        return '';
                    }

                }
            ],
            [
                'attribute' => 'srok',
                'format' => ['datetime', 'php:d M H:i'],
                'value' => 'srok',
                'hAlign' => GridView::ALIGN_RIGHT,
<<<<<<< HEAD
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => 'tr100 srok'];
                    } else {
                        return ['class' => 'textTr tr100 srok'];
                    }
                },
=======
                'contentOptions' => ['class' => 'textTr tr100 srok'],
>>>>>>> origin/master
            ],
            [
                'attribute' => 'minut',
                'hAlign' => GridView::ALIGN_RIGHT,
<<<<<<< HEAD
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => 'tr10'];
                    } else {
                        return ['class' => 'textTr tr10'];
                    }
                },
=======
                'contentOptions' => ['class' => 'textTr tr10'],
>>>>>>> origin/master
                'value' => function($model){
                    if ($model->minut == null){
                        return '';
                    } else {
                        return $model->minut;
                    }
                }
            ],
            [
                'attribute' => 'description',
                'value' => function($model){
                    return StringHelper::truncate($model->description, 100);
<<<<<<< HEAD
                },
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => ''];
                    } else {
                        return ['class' => 'textTr'];
                    }
                }
            ],
            [
                'attribute' => 'oplata',
                'value' => 'money',
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => 'tr70'];
                    } else {
                        return ['class' => 'textTr tr70'];
                    }
                }
=======
                }
            ],
            [
                 'attribute' => 'interior',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr50'],
                'value' =>  function($model){
                    if ($model->interior == 1) {
                        return '<i class="iconHolland" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true" title="Внутренний заказ"></i>';
                        }else {
                              return '';
                        }
                    }
            ],
            [
                'attribute' => 'oplata',
                'value' => 'money',
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr70'],
>>>>>>> origin/master
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function($model){
                   if ($model->status == Zakaz::STATUS_EXECUTE){
                        return Html::a('Готово', ['close']);
                   } else {
                       return '';
                   }
                },
<<<<<<< HEAD
                'contentOptions' => function($model) {
                    if ($model->statusUpdate == Zakaz::STATUS_UPDATE_ADMIN){
                        return ['class' => 'border-right tr70'];
                    } else {
                        return ['class' => 'textTr border-right tr70'];
                    }
                },
=======
                'contentOptions' => ['class' => 'textTr border-right tr70'],
>>>>>>> origin/master
            ]
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
<div class="footerNav">
    <?php echo Nav::widget([
        'options' => ['class' => 'nav nav-pills footerNav'],
        'items' => [
            ['label' => 'Архив', 'url' => ['zakaz/closezakaz'], 'visible' => Yii::$app->user->can('seeShop')],
        ],
    ]); ?>
</div>
<<<<<<< HEAD
<?php Modal::begin([
    'id' => 'modalTodoist',
    'header' => '<h2>Создать задачу к заказу</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php Modal::begin([
    'id' => 'modalReminder',
    'header' => '<h2>Поставить напоминание</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php Modal::begin([
    'id' => 'modalZakazview',
    'header' => '<h2>Полный просмотр</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php Modal::begin([
    'id' => 'modalZakazupdate',
    'header' => '<h2>Редактирование заказа</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
=======

>>>>>>> origin/master
