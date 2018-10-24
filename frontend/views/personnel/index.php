<?php

use app\models\Personnel;
use kartik\widgets\Alert;
<<<<<<< HEAD
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
=======
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
>>>>>>> origin/master
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonnelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
?>
<div class="personnel-index">
<<<<<<< HEAD
    <?php if (Yii::$app->user->can('admin')): ?>
        <?= Html::a(Html::encode('OK'), Url::to(['zakaz/admin']), ['class' => 'btn action']) ?>
    <?php endif; ?>
    <?php if (Yii::$app->user->can('shop')): ?>
        <?= Html::a(Html::encode('OK') , Url::to(['zakaz/shop']), ['class' => 'btn action']) ?>
    <?php endif; ?>
    <?php if (Yii::$app->user->can('design')): ?>
        <?= Html::a(Html::encode('OK') ,Url::to(['zakaz/design']), ['class' => 'btn action']) ?>
    <?php endif; ?>
    <?php if (Yii::$app->user->can('master')): ?>
        <?= Html::a(Html::encode('OK') , Url::to(['zakaz/master']), ['class' => 'btn action']) ?>
    <?php endif; ?>
    <?php if (Yii::$app->user->can('system')): ?>
        <?= Html::a(Html::encode('OK') , Url::to(['helpdesk/index']), ['class' => 'btn action']) ?>
    <?php endif; ?>
    <?php if (Yii::$app->user->can('zakup')): ?>
        <?= Html::a(Html::encode('OK') , Url::to(['custom/index']), ['class' => 'btn action']) ?>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
=======

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
>>>>>>> origin/master

    <p>
        <?php echo Alert::widget([
            'options' => ['class' => 'infoContact'],
            'body' => '<b>Внимание!</b> Если у Вас не форс-мажор или особая ситуация, не терпящая отлагательств (срочный крупный заказ; разгневанный клиент; любые контролирующие органы; поломка, которая сильно влияет на процесс работы), просьба звонить коллегам только в их рабочее время. Если все же случилась особая ситуация, то, в первую очередь, просьба обращаться к своему непосредственному руководителю. Если он не отвечает - то его руководителю, и так далее.'
        ]) ?>
    </p>
<<<<<<< HEAD

<?php Pjax::begin(); ?>
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'tableOptions' => ['class' => 'table table-bordered'],
//        'showHeader' => false,
//        'columns' => [
//            [
//                'attribute' => 'positions',
//                'filter' => \app\models\Position::find()->select(['name', 'id'])->indexBy('id')->column(),
//                'value' => 'positionsAsString',
//            ],
//            [
//                'attribute' => 'nameSotrud',
//            ],
//            [
//                'attribute' => 'phone',
//            ],
//            [
//                'attribute' => 'shedule',
//                'value' => function($model){
//                    return $model->shedule != null ? $model->shedule : false;
//                },
//            ],
//            [
//                'attribute' => 'job_duties',
//                'value' => function($model){
//                    return $model->job_duties != null ? $model->job_duties : false;
//                }
//            ],
//        ],
//    ]); ?>
=======
>>>>>>> origin/master
    <h3><?php echo Html::encode('Магазины') ?></h3>
    <table>
        <?php foreach (Personnel::getShop() as $shop){
            echo '<tr>
                <td style="padding: 8px">'.ArrayHelper::getValue($shop, 'Название').' ('.ArrayHelper::getValue($shop, 'Адрес').')</td>
                <td style="padding: 8px;width: 374px;text-align: right">'.ArrayHelper::getValue($shop, 'Телефон').'</td>
<<<<<<< HEAD
                <td style="padding: 8px;width: 210px;">'.ArrayHelper::getValue($shop, 'ПочтаВнеш').'</td>
                <td style="padding: 8px;width: 210px;">'.ArrayHelper::getValue($shop, 'ПочтаВнут').'</td>
=======
                <td style="padding: 8px;width: 374px;text-align: right">'.ArrayHelper::getValue($shop, 'Почта').'</td>
>>>>>>> origin/master
            </tr>';
        } ?>
    </table>
    <h3><?php echo Html::encode('Штат') ?></h3>
<<<<<<< HEAD
    <table>
=======
<?php Pjax::begin(); ?>

    <h3><?php /*echo Html::encode('Штат') */?></h3>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered' => false,
        'striped' => false,
       
        'tableOptions' => ['class' => 'table table-bordered'],
        'showHeader' => false,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/
            [
                'attribute' => 'positions',
                'filter' => \app\models\Position::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'positionsAsString',
                'contentOptions' => ['class' => 'textPerTr tr250'],
            ],
            [
                'attribute' => 'nameSotrud',
                 'contentOptions' => ['class' => 'textPerTr tr210'],
            ],
            [
                'attribute' => 'phone',
                'contentOptions' => ['class' => 'textPerTr tr100'],
            ],
            [
                'attribute' => 'store',
                'contentOptions' => ['class' => 'textPerTr tr50'],
            ],
           /* [
                'attribute' => 'shedule',
                'value' => function($model){
                    return $model->shedule != null ? $model->shedule : false;
                },
                'contentOptions' => ['class' => 'textPerTr tr70'],
            ],*/
            [
                'attribute' => 'job_duties',
                'value' => function($model){
                    return $model->job_duties != null ? $model->job_duties : false;
                },
                'contentOptions' => ['class' => 'textPerTr'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'contentOptions' => ['class' => 'textPerTr'],
            ],
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'contentOptions' => ['class' => 'textPerTr'],
            ],
        ],
    ]); ?>
     <table>
>>>>>>> origin/master
        <?php foreach(Personnel::getSotrud() as $sotrud) {
            echo '<tr>
            <td style="padding: 8px;white-space: normal;width: 250px">' . ArrayHelper::getValue($sotrud, 'Должность') . '</td>
            <td style="padding: 8px;width: 210px">' . ArrayHelper::getValue($sotrud, 'Имя') . '</td>
            <td style="padding: 8px;width: 100px">' . ArrayHelper::getValue($sotrud, 'Телефон') . '</td>
<<<<<<< HEAD
            <td style="padding: 8px">' . ArrayHelper::getValue($sotrud, 'Магазин') . '</td>
=======
            <td style="padding: 8px;width: 50px">' . ArrayHelper::getValue($sotrud, 'Магазин') . '</td>
>>>>>>> origin/master
            <td style="padding: 8px;width: 70px;">' . ArrayHelper::getValue($sotrud, 'График работы') . '</td>
            <td style="padding: 8px;white-space: normal">' . ArrayHelper::getValue($sotrud, 'Вопросы') . '</td>
            </tr>';
        }?>
    </table>
<<<<<<< HEAD
=======

>>>>>>> origin/master
<?php Pjax::end(); ?></div>
