<?php

use app\models\Comment;
<<<<<<< HEAD
use app\models\Zakaz;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
=======
use yii\helpers\StringHelper;
use kartik\grid\GridView;
use app\models\Zakaz;
use yii\widgets\Pjax;
>>>>>>> origin/master

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var  $comment app\models\Comment */

<<<<<<< HEAD
const TR_NEW_MASTER = 'trNewMaster';
$this->title = 'ВСЕ ЗАКАЗЫ';
?>
<?php /*Pjax::begin(['id' => 'pjax-container']); */?>

<div class="zakaz-index">
    <div class="container">
        <div class="row">
         <div class="col-lg-9 orderList">
            <h3>В работе</h3>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'floatHeader' => true,
                'headerRowOptions' => ['class' => 'headerTable'],
                'pjax' => true,
                'id'=> 10,
                'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
                'rowOptions' => function($model){
                    if ($model->srok < date('Y-m-d H:i:s') && $model->statusMaster != Zakaz::STATUS_MASTER_UPDATE) {
                        return ['class' => 'trTable trTablePass italic ' . TR_NEW_MASTER . ''];
                    }elseif($model->srok < date('Y-m-d H:i:s') && $model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                        return ['class' => 'trTable trTablePass bold  trNewMaster'];
                    }elseif($model->srok > date('Y-m-d H:i:s') && $model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                        return ['class' => 'trTable trNormal bold   trNewMaster'];
                    }else{
                        return ['class' => 'trTable trNormal trNewDesign'];
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
                        'value' => function () {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function ($model) {
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
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => 'tr70'];
                            } else {
                                return ['class' => 'textTr tr70'];
                            }
                        },
                    ],
                    [
                        'attribute' => '',
                        'format' => 'raw',
                        'contentOptions' => function($model) {
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => 'tr20'];
                            } else {
                                return ['class' => 'textTr tr20'];
                            }
                        },
                        'value' => function($model){
                            if ($model->prioritet == 2) {
                                return '<i class="fa fa-circle fa-red"></i>';
                            } elseif ($model->prioritet == 1) {
                                return '<i class="fa fa-circle fa-ping"></i>';
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
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => 'tr100'];
                            } else {
                                return ['class' => 'textTr tr100 srok'];
                            }
                        },
                    ],
                    [
                        'attribute' => 'minut',
                        'hAlign' => GridView::ALIGN_RIGHT,
                        'contentOptions' => function($model) {
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
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
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => ''];
                            } else {
                                return ['class' => 'textTr'];
                            }
                        },

                    ],
                    [
                        'attribute' => 'oplata',
                        'value' => 'money',
                        'hAlign' => GridView::ALIGN_RIGHT,
                        'contentOptions' => function($model) {
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => 'tr70'];
                            } else {
                                return ['class' => 'textTr tr70'];
                            }
                        },
                    ],
                    [
                        'attribute' => 'statusMasterName',
                        'contentOptions' => function($model) {
                            if ($model->statusMaster == Zakaz::STATUS_MASTER_UPDATE){
                                return ['class' => 'border-right tr90'];
                            } else {
                                return ['class' => 'border-right textTr tr90'];
                            }
                        },
                    ],
                ],
            ]); ?>

            <h3>На согласование</h3>
            <?= /** @var string $dataProviderSoglas */
            GridView::widget([
                'dataProvider' => $dataProviderSoglas,
                'floatHeader' => true,
                'headerRowOptions' => ['class' => 'headerTable'],
                'pjax' => true,
                'id'=> 11,
                'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
                'rowOptions' => function($model){
                    if ($model->statusMaster == Zakaz::STATUS_MASTER_NEW) {
                        return ['class' => 'trTable trNormal trNewMaster'];
                    } else {
                        return ['class' => 'trTable trNormal'];
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
                        'value' => function () {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function ($model) {
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
                        'contentOptions' => ['class' => 'textTr tr70'],
                    ],
                    [
                        'attribute' => '',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'tr20'],
                        'value' => function($model){
                            if ($model->prioritet == 2) {
                                return '<i class="fa fa-circle fa-red"></i>';
                            } elseif ($model->prioritet == 1) {
                                return '<i class="fa fa-circle fa-ping"></i>';
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
                        'attribute' => 'oplata',
                        'value' => function($model){
                            return $model->oplata.' р.';
                        },
                        'hAlign' => GridView::ALIGN_RIGHT,
                        'contentOptions' => ['class' => 'textTr tr70'],
                    ],
                    [
                        'attribute' => 'statusMasterName',
                        'contentOptions' => ['class' => 'border-right textTr tr90 success-ispol'],
                    ],
                ],
            ]); ?>
         </div>
         <div class="col-lg-3"></div>
        </div>
    </div>
<!--    --><?php /*Pjax::end(); */?>
</div>
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
    <h1>Пример работы с WebSocket</h1>
    <form action="" name="messages">
        <div class="row">Имя: <input type="text" name="fname"></div>
        <div class="row">Текст: <input type="text" name="msg"></div>
        <div class="row"><input type="submit" value="Поехали"></div>
    </form>
    <div id="status"></div>
<?php
$this->registerJsFile('/frontend/web/js/script.js');
echo <<<JS

<script>
    window.onload = function () {
        /*var socket = new WebSocket("ws://echo.websocket.org");*/
        var socket = new WebSocket("ws://localhost:8080");
        var status = document.querySelector("#status");
        console.log(socket)

        socket.onopen = function () {
            status.innerHTML = "cоединение установлено<br>";
        };

        socket.onclose = function (event) {
            if (event.wasClean) {
                status.innerHTML = 'cоединение закрыто';
            } else {
                status.innerHTML = 'соединения как-то закрыто';
            }
            status.innerHTML += '<br>код: ' + event.code + ' причина: ' + event.reason;
        };

        socket.onmessage = function (event) {
            let message = JSON.parse(event.data);
            status.innerHTML += `пришли данные:`+'<b>'+ message.name +'</b>'+  ':'+ message.msg + '<br>';
            if(message.msg!=0){
                 startRebTabl();
            }
        };
        
        
        socket.onerror = function (event) {
            status.innerHTML = "ошибка " + event.message;
        };
        document.forms["messages"].onsubmit = function () {
            let message = {
                name: this.fname.value,
                msg: this.msg.value
            }
            socket.send(JSON.stringify(message));
            return false;
        }
    }
    </script>
JS;
?>
=======
$this->title = 'Все заказы';
?>
<?php Pjax::begin(['id' => 'pjax-container']); ?>

<div class="zakaz-index">
    <h3>В работе</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
        'rowOptions' => function($model){
            if ($model->statusMaster == Zakaz::STATUS_MASTER_NEW) {
                return ['class' => 'trTable trNormal trNewMaster'];
            } else {
                return ['class' => 'trTable trNormal'];
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
                'value' => function () {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model) {
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
                'attribute' => 'oplata',
                'value' => 'money',
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr70'],
            ],
            [
                'attribute' => 'statusMasterName',
                'contentOptions' => ['class' => 'border-right textTr tr90'],
            ],
        ],
    ]); ?>

    <h3>На согласование</h3>
    <?= /** @var string $dataProviderSoglas */
    GridView::widget([
        'dataProvider' => $dataProviderSoglas,
        'floatHeader' => true,
        'headerRowOptions' => ['class' => 'headerTable'],
        'pjax' => true,
        'tableOptions' 	=> ['class' => 'table table-bordered tableSize'],
        'rowOptions' => function($model){
            if ($model->statusMaster == Zakaz::STATUS_MASTER_NEW) {
                return ['class' => 'trTable trNormal trNewMaster'];
            } else {
                return ['class' => 'trTable trNormal'];
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
                'value' => function () {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model) {
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
                'attribute' => 'oplata',
                'value' => function($model){
                    return $model->oplata.' р.';
                },
                'hAlign' => GridView::ALIGN_RIGHT,
                'contentOptions' => ['class' => 'textTr tr70'],
            ],
            [
                'attribute' => 'statusMasterName',
                'contentOptions' => ['class' => 'border-right textTr tr90 success-ispol'],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
>>>>>>> origin/master
