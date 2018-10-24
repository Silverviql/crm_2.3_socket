<?php

use app\models\User;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Todoist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todoist-modzakazForm">

    <?php $form = ActiveForm::begin(
        [ 'id' => 'todoistZakaz',]
    ); ?>

    <?= $form->field($todoist, 'srok')->widget(
        DatePicker::className(), [
        'pluginOptions' => [
            'autoclose'=>true,
            'startDate' => 'yyyy-mm-dd',
            'todayBtn' => true,
            'todayHighlight' => true,
        ]
    ])?>

    <?= $form->field($todoist, 'id_zakaz')->hiddenInput(['value' => $model])->label(false) ?>

    <?= $form->field($todoist, 'id_user')->dropDownList(
        ArrayHelper::map(User::find()->andWhere(['<>', 'id', User::USER_PROGRAM])
            ->andWhere(['<>', 'id', User::USER_DAMIR])
            ->andWhere(['<>', 'id', User::USER_ALBERT])
            ->all(),
            'id', 'name')
    ) ?>

    <?= $form->field($todoist, 'comment')->textarea(['rows' => 6]) ?>

    <div class="col-lg-3">
        <?php echo $todoist->img != null
            ? 'Файл: '.Html::a(Html::encode($todoist->img), '@web/todoist_img/'.$todoist->img, ['download' => true])
            : false
        ?>
        <?= $form->field($todoist, 'file')->widget(FileInput::className(), [
            'language' => 'ru',
            'options' => ['multiple' => false],
            'pluginOptions' => [
                'theme' => 'explorer',
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'showPreview' => false,
                'browseClass' => 'action fileInput',
                'browseLabel' =>  'Загрузить файл',
                'previewFileType' => 'any',
                'maxFileCount' => 1,
                'maxFileSize' => 25600,
                'preferIconicPreview' => true,
                'previewFileIconSettings' => ([
                    'doc' => '<i class="fa fa-file-word-o text-orange"></i>',
                    'docx' => '<i class="fa fa-file-word-o text-orange"></i>',
                    'xls' => '<i class="fa fa-file-excel-o text-orange"></i>',
                    'xlsx' => '<i class="fa fa-file-excel-o text-orange"></i>',
                    'ppt' => '<i class="fa fa-file-powerpoint-o text-orange"></i>',
                    'pptx' => '<i class="fa fa-file-powerpoint-o text-orange"></i>',
                    'pdf' => '<i class="fa fa-file-pdf-o text-orange"></i>',
                    'zip' => '<i class="fa fa-file-archive-o text-orange"></i>',
                    'rar' => '<i class="fa fa-file-archive-o text-orange"></i>',
                    'txt' => '<i class="fa fa-file-text-o text-orange"></i>',
                    'jpg' => '<i class="fa fa-file-photo-o text-orange"></i>',
                    'jpeg' => '<i class="fa fa-file-photo-o text-orange"></i>',
                    'png' => '<i class="fa fa-file-photo-o text-orange"></i>',
                    'gif' => '<i class="fa fa-file-photo-o text-orange"></i>',
                    'cdr' => '<i class="fa fa-file-photo-o text-orange"></i>',
                ]),
                'layoutTemplates' => [
                    'preview' => '<div class="file-preview {class}">
                               <div class="{dropClass}">
                               <div class="file-preview-thumbnails">
                                </div>
                                <div class="clearfix"></div>
                                <div class="file-preview-status text-center text-success"></div>
                                <div class="kv-fileinput-error"></div>
                                </div>
                                </div>',
                    'actionDrag' => '<span class="file-drag-handle {dragClass}" title="{dragTitle}">{dragIcon}</span>',
                ],
            ]
        ])->label(false) ?>
    </div>

    <?= $form->field($todoist, 'id_sotrud_put')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'action']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php
    $js = <<<JS
    $('#modalTodoist').on('beforeSubmit', 'form', function(){
        alert('Напоминание создано!');
	 var data = $(this).serialize();
	 $.ajax({
	    url: '/frontend/web/todoist/create-modzakaz?id=$model', 
	    type: 'POST',
	    data: data,
	    success: function(res){
	       console.log(res);
	    },
	    error: function(){
	       alert('Error!');
	    }
	 });
	 $('#modalTodoist').modal('hide'); //закрытие модального окна.
	 $('#modalTodoist').off('beforeSubmit', form);
	 return false;
     });
JS;
    $this->registerJs($js);

    ?>
</div>
