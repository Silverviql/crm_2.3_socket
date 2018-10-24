<?php

<<<<<<< HEAD
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\helpers\StringHelper;
use kartik\grid\GridView;
use app\models\Courier;
use app\models\Zakaz;
use app\models\Comment;
use yii\bootstrap\ButtonDropdown;

=======
use app\models\Courier;
use yii\bootstrap\Nav;
use yii\helpers\StringHelper;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Zakaz;
use app\models\Comment;
use yii\bootstrap\ButtonDropdown;
use yii\widgets\Pjax;
>>>>>>> origin/master


/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var $dataProviderWork yii\data\ActiveDataProvider */
/** @var $dataProviderIspol yii\data\ActiveDataProvider*/

<<<<<<< HEAD
$this->title = 'ВСЕ ЗАКАЗЫ';

?>

<div class="zakaz-index">
    <div class="container">
        <div class="row">
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
                        'url' => '#',
                        'options' => [
                            'class' => 'modalZakazcreate-button',
                            'value' => 'zakaz/create',
                             'id' => $model->id_zakaz,
                            'onclick' => 'return false'
                        ]
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
                        'url' => 'todoist/create'
                    ],
                         [
                        'label' => 'Доставка',
                        'url' => 'courier/create'
                    ],
                ]
            ]
        ]); ?>

            </div>
            <div class="col-lg-6 shopZakaz"></div>
            <div class="col-lg-6 zakazSearch">
                <?php echo $this->render('_search', ['model' => $searchModel]);?>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-9 orderList">
            <h3 class="titleTable">В работе</h3>
            <?= GridView::widget([
            'dataProvider' => $dataProviderWork,
            'floatHeader' => true,
            'headerRowOptions' => ['class' => 'headerTable'],
            'pjax' => true,
            'id'=> 10,
            'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
            'rowOptions' => function($model){
                if ($model->srok < date('Y-m-d H:i:s') && $model->status  != Zakaz::STATUS_NEW ) {
                    return ['class' => 'trTable trTablePass italic trSrok'];
                } elseif ($model->srok < date('Y-m-d H:i:s') && $model->status  == Zakaz::STATUS_NEW) {
                    return['class' => 'trTable trTablePass bold trSrok trNew'];
                } elseif ($model->srok > date('Y-m-d H:i:s') && $model->status  == Zakaz::STATUS_NEW){
                    return['class' => 'trTable bold trSrok trNew'];
                } else {
                    return ['class' => 'trTable srok trNormal'];
                }
            },
            'striped' => false,
            'columns' => [
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'contentOptions' => function($model){
                        return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                    },
                    'width'=>'10px',
                    'value' => function ($model, $key, $index) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail'=>function ($model, $key, $index, $column) {
                        $comment = new Comment();
                        return Yii::$app->controller->renderPartial('_zakaz', ['model'=> $model, 'comment' => $comment]);
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
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr70'];
                        } else {
                            return ['class' => 'textTr tr70'];
                        }
                    },
                ],
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'tr20'],
                    'value' => function($model){
                        if ($model->prioritet == 2) {
                            return '<i class="fa fa-circle fa-red" aria-hidden="true"></i>';
                        } elseif ($model->prioritet == 1) {
                            return '<i class="fa fa-circle fa-ping" aria-hidden="true"></i>';
                        } else {
                            return '';
                        }

                    }
                ],

                /*[
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'srok',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'width' => '9%',
                    'format' => ['datetime', 'php:d M H:i'],
                    'xlFormat' => "mmm\\-dd\\, \\-yyyy",
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr100'];
                        } else {
                            return ['class' => 'textTr tr100'];
                        }
                    },

                    'readonly' => function($model) {
                        return (!$model->srok); // do not allow editing of inactive records
                    },
                    'editableOptions' => [
                        'header' => 'Publish Date',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_WIDGET,
                        'widgetClass' =>  'kartik\datecontrol\DateControl',
                        'options' => [
                            'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                            'displayFormat' => 'dd.MM.yyyy',
                            'saveFormat' => 'php:Y-m-d',
                            'options' => [
                                'pluginOptions' => [
                                    'autoclose' => true
                                ]
                            ]
                        ]
                    ],
                ],*/
                [
                    'attribute' => 'srok',
                    'format' => ['datetime', 'php:d M H:i'],
                    'value' => 'srok',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr100 srok'];
                        } else {
                            return ['class' => 'textTr tr100 srok'];
                        }
                    },
                ],
                [
                    'attribute' => 'minut',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr10'];
                        } else {
                            return ['class' => 'textTr tr10'];
                        }
                    },
                    'value' => function($model){
                        if ($model->minut == null){
                            return '';
                        } else {
                            return $model->minut;
                        }
                    }
                ],
                /*[
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'description',
                    'pageSummary' => 'Total',
                    'vAlign' => 'middle',
                    'readonly' => function($model, $key, $index, $widget) {
                        return (!$model->description); // do not allow editing of inactive records
                    },
                    'editableOptions'=>[
                        'header'=>'Buy Amount',
                        'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                        'valueIfNull' => '-',
                    ],
                ],*/
               [
                    'attribute' => 'description',
                    'value' => function($model){
                        return StringHelper::truncate($model->description, 100);
                    }
                ],
                [
=======
$this->title = 'Вce заказы';
?>
<?php Pjax::begin(['id' => 'pjax-container']); ?>

<div class="zakaz-index">
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
                    'url' => 'todoist/create'
                ],
                     [
                    'label' => 'Доставка',
                    'url' => 'courier/create'
                ],
            ]
        ]
    ]); ?>
    </div>
        <?php //echo $this->render('_search', ['model' => $searchModel]);?>
    <div class="col-lg-12 divWork">
            <h3 class="titleTable">В работе</h3>
            <div class="col-lg-2 zakazSearch">
                <?php echo $this->render('_searchadmin', ['model' => $searchModel]);?>
            </div>
    </div>
    <div class="col-lg-12">
        <?= GridView::widget([
        'dataProvider' => $dataProviderWork,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],

        'rowOptions' => function($model){
            if ($model->srok < date('Y-m-d H:i:s') && $model->status > Zakaz::STATUS_NEW ) {
                return ['class' => 'trTable trTablePass italic trSrok'];
            } elseif ($model->srok < date('Y-m-d H:i:s') && $model->status == Zakaz::STATUS_NEW) {
                return['class' => 'trTable trTablePass bold trSrok trNew'];
            } elseif ($model->srok > date('Y-m-d H:i:s') && $model->status == Zakaz::STATUS_NEW){
                return['class' => 'trTable bold trSrok trNew'];
            } else {
                return ['class' => 'trTable srok trNormal'];
            }
        },
		'striped' => false,
        'columns' => [
			[
				'class'=>'kartik\grid\ExpandRowColumn',
                'contentOptions' => function($model){
                    return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                },                
				'width'=>'10px',
				'value' => function ($model, $key, $index) {
					return GridView::ROW_COLLAPSED;
				},
				'detail'=>function ($model, $key, $index, $column) {
                    $comment = new Comment();
					return Yii::$app->controller->renderPartial('_zakaz', ['model'=> $model, 'comment' => $comment]);
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
                'contentOptions' => function($model) {
                    if ($model->status == Zakaz::STATUS_NEW){
                        return ['class' => 'tr70'];
                    } else {
                        return ['class' => 'textTr tr70'];
                    }
                },
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr20'],
                'value' => function($model){
                    if ($model->prioritet == 2) {
                        return '<i class="fa fa-circle fa-red" aria-hidden="true" title="Важно/Брак в заказе"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-circle fa-ping" aria-hidden="true" title="Очень важно"></i>';
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
                'contentOptions' => function($model) {
                    if ($model->status == Zakaz::STATUS_NEW){
                        return ['class' => 'tr100 srok'];
                    } else {
                        return ['class' => 'textTr tr100 srok'];
                    }
                },
            ],
            [
                'attribute' => 'minut',
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => function($model) {
                    if ($model->status == Zakaz::STATUS_NEW){
                        return ['class' => 'tr10'];
                    } else {
                        return ['class' => 'textTr tr10'];
                    }
                },
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
                'attribute' => 'id_shipping',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr50'],
                'value' => function($model){
                        if ($model->id_shipping == null or $model->id_shipping == null){
                            return '';
                        } else {
                            if ($model->idShipping->status == Courier::DOSTAVKA) {
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true" title="На доставку"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::RECEIVE){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true" title="В пути"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::DELIVERED){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true" title="Доставлено"></i>';
                            } else {
                                return '';
                            }
                        }
                    }
            ],
            [
                'attribute' => 'oplata',
                'value' => function($model){
                    return number_format($model->oplata, 0,',', ' ').' р.';
                },
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => function($model) {
                    if ($model->status == Zakaz::STATUS_NEW){
                        return ['class' => 'tr70'];
                    } else {
                        return ['class' => 'textTr tr70'];
                    }
                },
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function($model){
                    return '';
                },
                'contentOptions' => ['class' => 'textTr border-right tr90'],
            ]
//            [
//                'attribute' => 'statusName',
//                'label' => 'Отв-ный',
//                'contentOptions' => ['class' => 'border-right'],
//            ],
//            [
//                'attribute' => 'status',
//                'class' => SetColumn::className(),
//                'label' => 'Отв-ный',
//                'format' => 'raw',
//                'name' => 'statusName',
//                'cssCLasses' => [
//                    Zakaz::STATUS_NEW => 'primary',
//                    Zakaz::STATUS_EXECUTE => 'success',
//                    Zakaz::STATUS_ADOPTED => 'warning',
//                    Zakaz::STATUS_REJECT => 'danger',
//                    Zakaz::STATUS_SUC_DISAIN => 'success',
//                    Zakaz::STATUS_SUC_MASTER => 'success',
//                ],
//                'contentOptions' => ['class' => 'border-right'],
//            ],
        ],
    ]); ?>
    </div>
    <div class="col-lg-12">
        <h3 class="titleTable">На исполнении</h3>
    </div>
    <div class="col-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'tableOptions'  => ['class' => 'table table-bordered tableSize'],
        'striped' => false,
        'rowOptions' => function($model){
            if ($model->srok < date('Y-m-d H:i:s')) {
                return['class' => 'trTable trTablePass trNormal'];
            } else {
                return['class' => 'trTable srok trNormal'];
            }
        },
        'columns' => [
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'contentOptions' => function($model){
                    return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                }, 
                'width'=>'10px',
                'value' => function ($model, $key, $index) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model, $key, $index, $column) {
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
                        return '<i class="fa fa-circle fa-red" aria-hidden="true" title="Важно/Брак в заказе"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-circle fa-ping" aria-hidden="true" title="Очень важно"></i>';
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
                },
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
                    'attribute' => 'id_shipping',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'tr50'],
                    'value' => function($model){
                        if ($model->id_shipping == null or $model->id_shipping == null){
                            return '';
                        } else {
                            if ($model->idShipping->status == Courier::DOSTAVKA) {
<<<<<<< HEAD
                                return '<i class="fa fa-truck"" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::RECEIVE){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::DELIVERED){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true"></i>';
=======
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true" title="На доставку"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::RECEIVE){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true" title="В пути"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::DELIVERED){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true" title="Доставлено"></i>';
>>>>>>> origin/master
                            } else {
                                return '';
                            }
                        }
                    }
<<<<<<< HEAD
                ],
                /*[
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'oplata',
                    'editableOptions'=>[
                        'header'=>'Buy Amount',
                        'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
                        'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
                    ],
                    'hAlign'=>'right',
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'format'=>['decimal', 0],
                    'pageSummary'=>true
                ],*/
                [
                    'attribute' => 'oplata',
                    'value' => function($model){
                        return number_format($model->oplata, 0,',', ' ').' р.';
                    },
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr70'];
                        } else {
                            return ['class' => 'textTr tr70'];
                        }
                    },
                ],
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'value' => function($model){
                        return '';
                    },
                    'contentOptions' => ['class' => 'textTr border-right tr90'],
                ]
    //            [
    //                'attribute' => 'statusName',
    //                'label' => 'Отв-ный',
    //                'contentOptions' => ['class' => 'border-right'],
    //            ],
    //            [
    //                'attribute' => 'status',
    //                'class' => SetColumn::className(),
    //                'label' => 'Отв-ный',
    //                'format' => 'raw',
    //                'name' => 'statusName',
    //                'cssCLasses' => [
    //                    Zakaz::STATUS_NEW => 'primary',
    //                    Zakaz::STATUS_EXECUTE => 'success',
    //                    Zakaz::STATUS_ADOPTED => 'warning',
    //                    Zakaz::STATUS_REJECT => 'danger',
    //                    Zakaz::STATUS_SUC_DESIGN => 'success',
    //                    Zakaz::STATUS_SUC_MASTER => 'success',
    //                ],
    //                'contentOptions' => ['class' => 'border-right'],
    //            ],
            ],
        ]); ?>
            <h3 class="titleTable">На исполнении</h3>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'floatHeader' => true,
                    'headerRowOptions' => ['class' => 'headerTable'],
                    'pjax' => true,
                    'id'=> 11,
                    'tableOptions'  => ['class' => 'table table-bordered tableSize'],
                    'striped' => false,
                    /*'rowOptions' => function($model){
                        if ($model->srok < date('Y-m-d H:i:s') && $model->statusUpdate  != Zakaz::STATUS_UPDATE_SHOP ) {
                            return ['class' => 'trTable trTablePass italic trSrok'];
                        } elseif ($model->srok < date('Y-m-d H:i:s') && $model->statusUpdate  == Zakaz::STATUS_UPDATE_SHOP) {
                            return['class' => 'trTable trTablePass bold trSrok trNewUpdate'];
                        } elseif ($model->srok > date('Y-m-d H:i:s') && $model->statusUpdate  == Zakaz::STATUS_UPDATE_SHOP){
                            return['class' => 'trTable bold trSrok trNewUpdate'];
                        } else {
                            return ['class' => 'trTable srok trNormal'];
                        }
                    },*/
                    'rowOptions' => function($model){
                        if ($model->srok < date('Y-m-d H:i:s')) {
                            return['class' => 'trTable trTablePass trNormal'];
                        } else {
                            return['class' => 'trTable srok trNormal'];
                        }
                    },
                    'columns' => [
                        [
                            'class'=>'kartik\grid\ExpandRowColumn',
                            'contentOptions' => function($model){
                                return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                            },
                            'width'=>'10px',
                            'value' => function ($model, $key, $index) {
                                return GridView::ROW_COLLAPSED;
                            },
                            'detail'=>function ($model, $key, $index, $column) {
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
                            'contentOptions' => function($model) {
                                /* if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                                     return ['class' => 'tr70'];
                                 } else */{
                                    return ['class' => 'textTr tr70'];
                                }
                            },
                        ],
                        [
                            'attribute' => '',
                            'format' => 'raw',
                            'contentOptions' => ['class' => 'tr20'],
                            'value' => function($model){
                                if ($model->prioritet == 2) {
                                    return '<i class="fa fa-circle fa-red" aria-hidden="true"></i>';
                                } elseif ($model->prioritet == 1) {
                                    return '<i class="fa fa-circle fa-ping" aria-hidden="true"></i>';
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
                            'contentOptions' => function($model) {
                                /* if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                                     return ['class' => 'tr100 srok'];
                                 } else */{
                                    return ['class' => 'textTr tr100 srok'];
                                }
                            },
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
                            },
                            'contentOptions' => function($model) {
                                /* if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                                     return ['class' => ''];
                                 } else */{
                                    return ['class' => 'textTr'];
                                }
                            },
                        ],
                        [
                                'attribute' => 'id_shipping',
                                'format' => 'raw',
                                'contentOptions' => ['class' => 'tr50'],
                            'value' => function($model){
                                if ($model->id_shipping == null or $model->id_shipping == null){
                                    return '';
                                } else {
                                    if ($model->idShipping->status == Courier::DOSTAVKA) {
                                        return '<i class="fa fa-truck" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true"></i>';
                                    }
                                    elseif ($model->idShipping->status == Courier::RECEIVE){
                                        return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true"></i>';
                                    }
                                    elseif ($model->idShipping->status == Courier::DELIVERED){
                                        return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true"></i>';
                                    } else {
                                        return '';
                                    }
                                }
                            }
                        ],
                        [
                            'attribute' => 'oplata',
                            'headerOptions' => ['width' => '70'],
                            'value' => function($model){
                                return number_format($model->oplata,0, ',', ' ').' р.';
                            },
                            'hAlign' => GridView::ALIGN_RIGHT,
                            'contentOptions' => function($model) {
                                /* if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                                     return ['class' => 'tr70'];
                                 } else */{
                                    return ['class' => 'textTr tr70'];
                                }
                            },
                        ],
                        [
                            'attribute' => 'statusName',
                            'label' => 'Отв-ный',
                            'contentOptions' => function($model) {
                                if ($model->id_unread == true && $model->srok < date('Y-m-d H:i:s')){
                                    return ['class' => 'border-right trNew'];
                                } elseif ($model->id_unread == true && $model->srok > date('Y-m-d H:i:s')){
                                    return ['class' => 'border-right success-ispol'];
                                } else {
                                    return ['class' => 'border-right textTr'];
                                }
                            },
                        ],
                    ],
                ]); ?>
            <h3 class="titleTable">На закрытие</h3>
            <?= GridView::widget([
            'dataProvider' => $dataProviderIspol,
            'floatHeader' => true,
            'headerRowOptions' => ['class' => 'headerTable'],
            'pjax' => true,
            'id'=> 12,
            'striped' => false,
            'tableOptions' => ['class' => 'table table-bordered tableSize'],
            /*'rowOptions' => function($model){
                if ($model->srok < date('Y-m-d H:i:s') && $model->statusUpdate  != Zakaz::STATUS_UPDATE_SHOP ) {
                    return ['class' => 'trTable trTablePass italic trSrok'];
                } elseif ($model->srok < date('Y-m-d H:i:s') && $model->statusUpdate  == Zakaz::STATUS_UPDATE_SHOP) {
                    return['class' => 'trTable trTablePass bold trSrok trNewUpdate'];
                } elseif ($model->srok > date('Y-m-d H:i:s') && $model->statusUpdate  == Zakaz::STATUS_UPDATE_SHOP){
                    return['class' => 'trTable bold trSrok trNewUpdate'];
                } else {
                    return ['class' => 'trTable srok trNormal'];
                }
            },*/
           'rowOptions' => ['class' => 'trTable srok trNormal'],
            'columns' => [
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'contentOptions' => function($model){
                        return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                    },
                    'width'=>'10px',
                    'value' => function ($model, $key, $index) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail'=>function ($model, $key, $index, $column) {
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
                    'contentOptions' => function($model) {
                        /*  if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                              return ['class' => 'tr70'];
                          } else */{
                            return ['class' => 'textTr tr70'];
                        }
                    },
                ],
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'tr20'],
                    'value' => function($model){
                        if ($model->prioritet == 2) {
                            return '<i class="fa fa-circle fa-red" aria-hidden="true"></i>';
                        } elseif ($model->prioritet == 1) {
                            return '<i class="fa fa-circle fa-ping" aria-hidden="true"></i>';
                        } else {
                            return '';
                        }

                    }
                ],
               /* [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'srok',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'width' => '9%',
                    'format' => ['datetime', 'php:d M H:i'],
                    'xlFormat' => "mmm\\-dd\\, \\-yyyy",

                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_NEW){
                            return ['class' => 'tr100 srok'];
                        } else {
                            return ['class' => 'textTr tr100 srok'];
                        }
                    },
                    'readonly' => function($model) {
                        return (!$model->srok); // do not allow editing of inactive records
                    },
                    'editableOptions' => [
                        'header' => 'Publish Date',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_WIDGET,
                        'widgetClass' =>  'kartik\datecontrol\DateControl',
                        'options' => [
                            'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                            'displayFormat' => 'dd.MM.yyyy',
                            'saveFormat' => 'php:Y-m-d',
                            'options' => [
                                'pluginOptions' => [
                                    'autoclose' => true
                                ]
                            ]
                        ]
                    ],
                ],*/
                [
                    'attribute' => 'srok',
                    'format' => ['datetime', 'php:d M H:i'],
                    'value' => 'srok',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => function($model) {
                        if ($model->statusUpdate == Zakaz::STATUS_UPDATE_SHOP){
                            return ['class' => 'tr100'];
                        } else {
                            return ['class' => 'textTr tr100'];
                        }
                    },
                ],
                [
                    'attribute' => 'minut',
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => function($model) {
                        if ($model->status == Zakaz::STATUS_UPDATE_SHOP){
                            return ['class' => 'tr10'];
                        } else {
                            return ['class' => 'textTr tr10'];
                        }
                    },
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
                    },
                     'contentOptions' => function($model) {
                        if ($model->statusDesign == Zakaz::STATUS_UPDATE_SHOP){
                            return ['class' => ''];
                        } else {
                            return ['class' => 'textTr'];
                        }
                    },
                ],
                [
                     'attribute' => 'restoring',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'tr50'],
                    'value' =>  function($model){
                        if ($model->restoring == 1) {
                            return '<i class="fa fa-inbox" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true"></i>';
                            }else {
                                  return '';
                            }
                        }
                ],
                [
                    'attribute' => 'id_shipping',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'tr50'],
                    'value' => function($model){
=======
            ],
            [
                'attribute' => 'oplata',
                'headerOptions' => ['width' => '70'],
                'value' => function($model){
                    return number_format($model->oplata,0, ',', ' ').' р.';
                },
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr70'],
            ],
            [
                'attribute' => 'statusName',
                'label' => 'Отв-ный',
                'contentOptions' => function($model) {
                    if ($model->id_unread == true && $model->srok < date('Y-m-d H:i:s')){
                        return ['class' => 'border-right /*success-ispol*/ trNew'];
                    } elseif ($model->id_unread == true && $model->srok > date('Y-m-d H:i:s')){
                        return ['class' => 'border-right /*success-ispol*/ trNew'];
                    } else {
                        return ['class' => 'border-right textTr'];
                    }
                },
            ],
        ],
    ]); ?>
    </div>
    <div class="col-lg-12">
        <h3 class="titleTable">На закрытие</h3>
    </div>
    <div class="col-lg-12">
        <?= GridView::widget([
        'dataProvider' => $dataProviderIspol,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'striped' => false,
        'tableOptions' => ['class' => 'table table-bordered tableSize'],
        'rowOptions' => ['class' => 'trTable srok trNormal'],
        'columns' => [
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'contentOptions' => function($model){
                    return ['id' => $model->id_zakaz, 'class' => 'border-left', 'style' => 'border:none'];
                }, 
                'width'=>'10px',
                'value' => function ($model, $key, $index) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model, $key, $index, $column) {
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
                        return '<i class="fa fa-circle fa-red" aria-hidden="true" title="Важно/Брак в заказе"></i>';
                    } elseif ($model->prioritet == 1) {
                        return '<i class="fa fa-circle fa-ping" aria-hidden="true" title="Очень важно"></i>';
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
                'attribute' => 'id_shipping',
                'format' => 'raw',
                'contentOptions' => ['class' => 'tr50'],
                'value' => function($model){
>>>>>>> origin/master
                        if ($model->id_shipping == null or $model->id_shipping == null){
                            return '';
                        } else {
                            if ($model->idShipping->status == Courier::DOSTAVKA) {
<<<<<<< HEAD
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::RECEIVE){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::DELIVERED){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true"></i>';
=======
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #5A4EF0;" aria-hidden="true"  title="На доставку"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::RECEIVE){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #f0ad4e;" aria-hidden="true"  title="В пути"></i>';
                            }
                            elseif ($model->idShipping->status == Courier::DELIVERED){
                                return '<i class="fa fa-truck" style="font-size: 13px;color: #191412;" aria-hidden="true"  title="Доставлено"></i>';
>>>>>>> origin/master
                            } else {
                                return '';
                            }
                        }
                    }
<<<<<<< HEAD
                ],
                [
                    'attribute' => 'oplata',
                    'value' => function($model){
                        return number_format($model->oplata,0, ',', ' ').' р.';
                    },
                    'hAlign' => GridView::ALIGN_RIGHT,
                    'contentOptions' => ['class' => 'textTr tr70'],
                ],
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'value' => function(){
                        return '';
                    },
                    'contentOptions' => ['class' => 'textTr border-right tr90'],
                ]
            ],
        ]); ?>
          </div>
          <div class="col-lg-3"></div>
        </div>
    </div>
=======
            ],
            [
                'attribute' => 'oplata',
                'value' => function($model){
                    return number_format($model->oplata,0, ',', ' ').' р.';
                },
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr70'],
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function(){
                    return '';
                },
                'contentOptions' => ['class' => 'textTr border-right tr90'],
            ]
        ],
    ]); ?> 
    <?php Pjax::end(); ?>
    </div>
    <?php Modal::begin([
        'id' => 'declinedModal',
        'header' => '<h2>Укажите причину отказа:</h2>',
    ]);

    echo '<div class="modalContent"></div>';

    Modal::end();?>
    <?php Modal::begin([
        'id' => 'acceptdModal',
        'header' => '<h2>Назначить ответственного:</h2>',
    ]);

    echo '<div class="modalContent"></div>';

    Modal::end();?>
>>>>>>> origin/master
</div>
<div class="footer">
    <?php echo Nav::widget([
        'options' => ['class' => 'nav nav-pills footerNav'],
        'items' => [
            ['label' => 'Архив', 'url' => ['archive'], 'visible' => Yii::$app->user->can('seeAdmin')],
        ],
    ]); ?>
</div>
<<<<<<< HEAD
<?php Modal::begin([
    'id' => 'declinedModal',
    'header' => '<h2>Укажите причину отказа:</h2>',
]);

echo '<div class="modalContent"></div>';

Modal::end();?>
<?php Modal::begin([
    'id' => 'acceptdModal',
    'header' => '<h2>Назначить ответственного:</h2>',
]);

echo '<div class="modalContent"></div>';

Modal::end();?>
<?php Modal::begin([
    'id' => 'modalReminder',
    'header' => '<h2>Поставить напоминание</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php Modal::begin([
    'id' => 'modalTodoist',
    'header' => '<h2>Создать задачу к заказу</h2>'
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
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'header' => '<h2>Редактирование заказа</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php Modal::begin([
    'id' => 'modalZakazcreate',
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'header' => '<h2>Создание заказа</h2>'
]);
echo '<div class="modalContent"></div>';
Modal::end(); ?>
<?php
$this->registerJsFile('/js/autobahn.min.js');

$script = <<<JS

        var conn = new ab.connect('ws://localhost:8080',
                function(session) {
                    // eventMonitoring идентификатор, который мы передаём в push класс.
                   session.subscribe('onNewData', function(topic, data) {
                       startRebTabl();
                        // Сюда будут прилетать данные от вашего веб приложения.
                        console.info('New data: topic_id: "' + topic + '"');
                        console.log(data);
                    });
                },
                function(code, reason, detail) {
			console.warn('WebSocket connection closed: code=' + code + '; reason=' + reason + '; detail=' + detail);
		},
		{
			'maxRetries': 60,
			'retryDelay': 4000,
			'skipSubprotocolCheck': true
		}
        );
   
JS;
$this->registerJs($script);
\yii\web\JqueryAsset::className();

?>
=======
>>>>>>> origin/master
