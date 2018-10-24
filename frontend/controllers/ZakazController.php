<?php

namespace frontend\controllers;

<<<<<<< HEAD
use console\components\Pusher;
=======
>>>>>>> origin/master
use Yii;
use app\models\Zakaz;
use app\models\Courier;
use app\models\Comment;
use app\models\Notification;
<<<<<<< HEAD
use app\models\ServiceParameters;
=======
>>>>>>> origin/master
use yii\helpers\ArrayHelper;
use frontend\models\Telegram;
use app\models\ZakazSearch;
use app\models\User;
use app\models\Notice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
<<<<<<< HEAD
use yii\helpers\Json;
use kartik\widgets\Select2;
=======
>>>>>>> origin/master
/**
 * ZakazController implements the CRUD actions for Zakaz model.
 */
class ZakazController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => 'yii\filters\VerbFilter',
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            // 'caching' => [
            //     'class' => 'yii\filters\HttpCache',
<<<<<<< HEAD
            //     'only' => ['admin', 'shop', 'master', 'design'],
=======
            //     'only' => ['admin', 'shop', 'master', 'disain'],
>>>>>>> origin/master
            //     'lastModified' => function(){
            //         return Zakaz::find()->max('date_update');
            //     }
            // ],
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['shop', 'admin', 'program'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
<<<<<<< HEAD
                        'roles' => ['admin', 'design', 'master', 'program', 'shop'],
                    ],
                    [
                        'actions' => ['service'],
                        'allow' => true,
                        'roles' => ['shop', 'admin', 'program'],
=======
                        'roles' => ['admin', 'disain', 'master', 'program', 'shop'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
<<<<<<< HEAD
                        'roles' => ['admin', 'design', 'master', 'program', 'shop', 'zakup', 'system', 'manager'],
=======
                        'roles' => ['admin', 'disain', 'master', 'program', 'shop', 'zakup', 'system', 'manager'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['check'],
                        'allow' => true,
                        'roles' => ['master', 'program'],
                    ],
                    [
<<<<<<< HEAD
                        'actions' => ['uploadedesign'],
                        'allow' => true,
                        'roles' => ['design', 'program'],
=======
                        'actions' => ['uploadedisain'],
                        'allow' => true,
                        'roles' => ['disain', 'program'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['close'],
                        'allow' => true,
                        'roles' => ['admin', 'program', 'shop'],
                    ],
                    [
                        'actions' => ['restore'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['admin'],
                        'allow' => true,
                        'roles' => ['admin', 'program', 'manager'],
                    ],
                    [
                        'actions' => ['shop'],
                        'allow' => true,
                        'roles' => ['shop', 'program', 'manager'],
                    ],
                    [
<<<<<<< HEAD
                        'actions' => ['design'],
                        'allow' => true,
                        'roles' => ['design', 'program', 'manager'],
=======
                        'actions' => ['disain'],
                        'allow' => true,
                        'roles' => ['disain', 'program', 'manager'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['master'],
                        'allow' => true,
                        'roles' => ['master', 'program', 'manager'],
                    ],
                    [
                        'actions' => ['courier'],
                        'allow' => true,
                        'roles' => ['courier', 'program'],
                    ],
                    [
                        'actions' => ['manager'],
                        'allow' => true,
                        'roles' => ['manager', 'program'],
                    ],
                    [
                        'actions' => ['archive'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['closezakaz'],
                        'allow' => true,
                        'roles' => ['shop', 'program'],
                    ],
                    [
                        'actions' => ['ready'],
                        'allow' => true,
<<<<<<< HEAD
                        'roles' => ['design', 'program'],
=======
                        'roles' => ['disain', 'program'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['adopted'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
<<<<<<< HEAD
                        'actions' => ['adopdesign'],
                        'allow' => true,
                        'roles' => ['design', 'program'],
=======
                        'actions' => ['adopdisain'],
                        'allow' => true,
                        'roles' => ['disain', 'program'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['adopmaster'],
                        'allow' => true,
                        'roles' => ['master', 'program'],
                    ],
                    [
<<<<<<< HEAD
                        'actions' => ['adopupdate'],
                        'allow' => true,
                        'roles' => ['admin','shop', 'program'],
                    ],
                    [
                        'actions' => ['statusdesign'],
                        'allow' => true,
                        'roles' => ['design', 'program'],
=======
                        'actions' => ['statusdisain'],
                        'allow' => true,
                        'roles' => ['disain', 'program'],
>>>>>>> origin/master
                    ],
                    [
                        'actions' => ['zakazedit'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['zakaz'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['comment'],
                        'allow' => true,
                        'roles' => ['admin', 'program'],
                    ],
                    [
                        'actions' => ['declined'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['accept'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['fulfilled'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['reconcilation'],
                        'allow' => true,
<<<<<<< HEAD
                        'roles' => ['design']
=======
                        'roles' => ['disain']
>>>>>>> origin/master
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Zakaz models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Zakaz();
        $notification = $this->findNotification();

        return $this->render('index', [
            'model' => $model,
            'notification' => $notification,
        ]);
    }

    /**
     * Displays a single Zakaz model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $reminder = new Notification();
        $commentField = new Comment();
        $comment = Comment::find()->zakaz($id);
        // $comment = ArrayHelper::index($comment, null, 'just_date');
        $notice = Notice::find()->where(['order_id' => $id])->orderBy('id DESC')->all();
//        $zakaz = $model->id_zakaz;

        $dataProvider = new ActiveDataProvider([
            'query' => Courier::find()->select(['date', 'to', 'from', 'commit', 'status'])->where(['id_zakaz' => $id])
        ]);

<<<<<<< HEAD
        return $this->renderAjax('view', [
=======
        return $this->render('view', [
>>>>>>> origin/master
            'model' => $model,
            'dataProvider' => $dataProvider,
            'comment' => $comment,
            'notice' => $notice,
            'commentField' => $commentField,
        ]);
    }

    /**
     * appointed shipping in courier
     * @param $id
     * @return string
     */
    public function actionShipping($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne(['id' => User::USER_COURIER]);
        $shipping = new Courier();
        if ($model->load(Yii::$app->request->post())) {
            $shipping->save();
            $model->id_shipping = $shipping->id;
            if (!$model->save()) {
                print_r($model->getErrors());
            } else {
                $model->save();
                try{
                    /*\Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Назначена доставка '.$model->prefics);*/
                }catch (Exception $e){
                    $e->getMessage();
                }
            }
        }

        return $this->render('shipping', [
            'model' => $model,
            'shipping' => $shipping,
        ]);
    }

    /**
     * Creates a new Zakaz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zakaz();
        $user = User::findOne(['id' => User::USER_ADMIN]);
<<<<<<< HEAD
       /* $notification = $this->findNotification();*/
        $notification = new Notification();

        $tomorrow = date("Y-m-d", time() + 86400);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if(Yii::$app->request->post('Zakaz')['srok_time'] == null){
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.date('H-i-s');;
            }else{
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }
            if(Yii::$app->request->post('Zakaz')['srok_date'] == null){
                $model->srok = $tomorrow.' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }else{
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }
            if(Yii::$app->request->post('Zakaz')['srok_time'] == null && Yii::$app->request->post('Zakaz')['srok_date'] == null){
                $model->srok = $tomorrow.' '.date('H-i-s');;
            }else{
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }
=======
        $notification = $this->findNotification();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $model->upload('create');
                }
>>>>>>> origin/master
            if (!$model->save()) {
                print_r($model->getErrors());
                Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
            } else {
<<<<<<< HEAD
                if (Yii::$app->request->isAjax) {
                $model->save();
                Yii::$app->session->addFlash('update', 'Успешно создан заказ '.$model->prefics);
                try{
                    if($model->status == Zakaz::STATUS_DESIGN){
=======
                $model->save();
                Yii::$app->session->addFlash('update', 'Успешно создан заказ '.$model->prefics);
                try{
                    if($model->status == Zakaz::STATUS_DISAIN){
>>>>>>> origin/master
                        $user = User::findOne(['id' => User::USER_DISAYNER]);
                        if($user->telegram_chat_id){
                    /*        \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                        }
                    }
                    if($user->telegram_chat_id){
                    /* \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Создан заказ '.$model->prefics.' '.$model->description);   */
                    }
                }catch (Exception $e){
                    $e->getMessage();
                }
<<<<<<< HEAD
                if (Yii::$app->user->id != User::USER_ADMIN ){
                    $notification->getByIdNotification(2, $model->id_zakaz);
                    $notification->getSaveNotification();
                }

                if($model->status == Zakaz::STATUS_DESIGN){
                    $notification->getByIdNotification(3, $model->id_zakaz);
                    $notification->getSaveNotification();
                    /* $telegram->message(User::USER_DISAYNER, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                }
                if ($model->status == Zakaz::STATUS_MASTER ){
                    $notification->getByIdNotification(4, $model->id_zakaz);
                    $notification->getSaveNotification();
                    /* $telegram->message(User::USER_MASTER, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                }
            }
                /*$telegram->message(User::USER_ADMIN, 'Создан заказ '.$model->prefics.' '.$model->description);*/
            }



           /* if (Yii::$app->user->can('shop')) {
                return $this->redirect(['shop']);
            } elseif (Yii::$app->user->can('admin')) {
                return $this->redirect(['admin']);
            }*/
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'notification' => $notification,
        ]);
        /*return $this->render('create', [
            'model' => $model,
            'notification' => $notification,
        ]);*/
    }

    public function actionService()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = ServiceParameters::findAll(['id_service'=>$id]);
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $model) {
                    $idservisepar = ServiceParameters::findOne($model['id']);
                    $titleservisepar = ServiceParameters::findOne($model['id']);
                    $out[] = ['id' => $model['id'], 'name' => $idservisepar->id.' ('.$titleservisepar->title.')'];
                    if ($i == 0) {
                        $selected = $model['id'];
                    }
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected'=>'']);
    }


=======
            }

            if (Yii::$app->user->can('shop')) {
                return $this->redirect(['shop']);
            } elseif (Yii::$app->user->can('admin')) {
                return $this->redirect(['admin']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'notification' => $notification,
        ]);
    }

>>>>>>> origin/master
    /**
     * Updates an existing Zakaz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
<<<<<<< HEAD
        $notification = new Notification();
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->post('Zakaz')['srok_time'] != null ){
                $srok_data = date("Y-m-d", strtotime($model->srok));
                $model->srok = $srok_data.' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }
            if(Yii::$app->request->post('Zakaz')['srok_date'] != null ){
                $srok_time = date("H:i:s", strtotime($model->srok));
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.$srok_time;
            }
            if(Yii::$app->request->post('Zakaz')['srok_time'] != null && Yii::$app->request->post('Zakaz')['srok_date'] != null){
                $model->srok = Yii::$app->request->post('Zakaz')['srok_date'].' '.Yii::$app->request->post('Zakaz')['srok_time'];
            }
=======
        $notification = $this->findNotification();

        if ($model->load(Yii::$app->request->post())) {
>>>>>>> origin/master
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)) {
                $model->upload('update', $id);
            }
<<<<<<< HEAD
            if ($model->status == Zakaz::STATUS_DESIGN or $model->status == Zakaz::STATUS_MASTER or Zakaz::STATUS_AUTSORS) {
                if($model->status == Zakaz::STATUS_DESIGN && $model->statusDesign != Zakaz::STATUS_DESIGNER_NEW){
                    $model->statusDesign = Zakaz::STATUS_DESIGNER_UPDATE;
                    $model->id_unread = 0;
                }elseif($model->status == Zakaz::STATUS_MASTER && $model->statusMaster != Zakaz::STATUS_MASTER_NEW){
                    $model->statusMaster = Zakaz::STATUS_MASTER_UPDATE;
                    $model->id_unread = 0;
                }elseif($model->status == Zakaz::STATUS_DESIGN || $model->status == Zakaz::STATUS_MASTER){
                    $model->statusDesign = Zakaz::STATUS_DESIGNER_NEW;
=======
            if ($model->status == Zakaz::STATUS_DISAIN or $model->status == Zakaz::STATUS_MASTER or Zakaz::STATUS_AUTSORS) {
                if($model->status == Zakaz::STATUS_DISAIN){
                    $model->statusDisain = Zakaz::STATUS_DISAINER_NEW;
                    $model->id_unread = 0;
                } elseif($model->status == Zakaz::STATUS_MASTER){
>>>>>>> origin/master
                    $model->statusMaster = Zakaz::STATUS_MASTER_NEW;
                    $model->id_unread = 0;
                } else {
                    $model->id_unread = 0;
                }
<<<<<<< HEAD
=======
                
>>>>>>> origin/master
            }
            $model->validate();
            $user = User::findOne(['id' => User::USER_DISAYNER]);
            if (!$model->save()) {
                print_r($model->getErrors());
                Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
            } else {
<<<<<<< HEAD
                if (Yii::$app->request->isAjax) {
                    if ($model->status == Zakaz::STATUS_MASTER /*&& $user->telegram_chat_id*/) {
                        $notification->getByIdNotification(4, $id);
                        $notification->getSaveNotification();
                        /* $telegram->message(User::USER_MASTER, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                    }


                    if ($model->status == Zakaz::STATUS_DESIGN /*&& $user->telegram_chat_id*/) {
                        $notification->getByIdNotification(3, $id);
                        $notification->getSaveNotification();
                        /*  $telegram->message(User::USER_DISAYNER, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                    }
                    $model->save();
                    Yii::$app->session->addFlash('update', 'Успешно отредактирован заказ');
                }
            }
            /*if (Yii::$app->user->can('shop')) {
                return $this->redirect(['shop']);
            } elseif (Yii::$app->user->can('admin')) {
                return $this->redirect(['admin']);
            }*/
        }


        return $this->renderAjax('update', [
            'model' => $model,
            'notification' => $notification,
        ]);

       /* return $this->render('update', [
            'model' => $model,
            'notification' => $notification,
        ]);*/
=======
                if($model->status == Zakaz::STATUS_DISAIN && $user->telegram_chat_id != null){
                    /*\Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Назначен заказ '.$model->prefics.' '.$model->description);*/
                }
                $model->save();
                Yii::$app->session->addFlash('update', 'Успешно отредактирован заказ');
            }

            if (Yii::$app->user->can('shop')) {
                return $this->redirect(['shop']);
            } elseif (Yii::$app->user->can('admin')) {
                return $this->redirect(['admin']);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'notification' => $notification,
        ]);
>>>>>>> origin/master
    }

    /**
     * Master fulfilled zakaz
     * if success redirected zakaz/master
     * @param $id
     * @return \yii\web\Response
     */
    public function actionCheck($id)//Мастер выполнил свою работу
    {
        $model = $this->findModel($id);
        $user = User::findOne(['id' => 5]);
        $notification = new Notification();

        $model->status = Zakaz::STATUS_SUC_MASTER;
        $model->statusMaster = Zakaz::STATUS_MASTER_PROCESS;
        $model->id_unread = true;
        $notification->getByIdNotification(8, $id);
        $notification->saveNotification;
        if ($model->save()) {
            try{
                Yii::$app->session->addFlash('update', 'Заказ отправлен на проверку');
<<<<<<< HEAD
                $notification->getByIdNotification(8, $id);
                $notification->saveNotification;
=======
>>>>>>> origin/master
               /* \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Мастер выполнил работу '.$model->prefics.' '.$model->description);*/
            }catch (Exception $e){
                $e->getMessage();
            }
            return $this->redirect(['master']);
        } else {
            print_r($model->getErrors());
            Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
        }
    }

    /**
<<<<<<< HEAD
     * Design fulfilled zakaz
     * @param $id
     * @return string
     */
    public function actionUploadedesign($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne(['id' => 5]);
        $notification = new Notification();
=======
     * Disain fulfilled zakaz
     * @param $id
     * @return string
     */
    public function actionUploadedisain($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne(['id' => 5]);
>>>>>>> origin/master

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            //Выполнение работы дизайнером
            if (isset($model->file)) {
                $model->uploadeFile;
            }
<<<<<<< HEAD
            $model->status = Zakaz::STATUS_SUC_DESIGN;
            $model->statusDesign = Zakaz::STATUS_DESIGNER_PROCESS;
=======
            $model->status = Zakaz::STATUS_SUC_DISAIN;
            $model->statusDisain = Zakaz::STATUS_DISAINER_PROCESS;
>>>>>>> origin/master
            $model->id_unread = true;
            if ($model->save()) {
                if (isset($model->file)) {
                    $model->file->saveAs('maket/Maket_'.$model->id_zakaz.'.'.$model->file->extension);
                }
                try{
                    Yii::$app->session->addFlash('update', 'Заказ отправлен на проверку');
<<<<<<< HEAD
                    $notification->getByIdNotification(5, $id);
                    $notification->saveNotification;
                    $data = [
                        'topic_id' => 'onNewData',
                        'data'  => 'eventData' . rand(1,100)
                    ];
                    Pusher::sentDataToServer($data);
=======
>>>>>>> origin/master
                  /*  \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Дизайнер выполнил работу '.$model->prefics.' '.$model->description);*/
                }catch (Exception $e){
                    $e->getMessage();
                }
<<<<<<< HEAD
                return $this->redirect(['design', 'id' => $id]);
=======
                return $this->redirect(['disain', 'id' => $id]);
>>>>>>> origin/master
            } else {
                print_r($model->getErrors());
                Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
            }
        }
        return $this->renderAjax('_upload', [
            'model' => $model
        ]);
    }

    /**
     * When zakaz close Shope or Admin
     * if success then redirected shop or admin
     * @param integer $id
     * @return mixed
     */
    public function actionClose($id)
    {
        $model = $this->findModel($id);
        $model->action = 0;
        $model->date_close = date('Y-m-d H:i:s');
<<<<<<< HEAD
        $notification = new Notification();
        if(($model->oplata - $model->fact_oplata) !== 0){
            Yii::$app->session->addFlash('errors', 'Нельзя закрыть заказ с оплатой 0!');
=======
         if(($model->oplata - $model->fact_oplata) !== 0){
            Yii::$app->session->addFlash('errors', 'Нельзя закрыть неоплаченный!');
>>>>>>> origin/master
            return $this->redirect(['zakaz/update', 'id'=> $model->id_zakaz ]);

        } else {
            if (!$model->save()) {
                Yii::$app->session->addFlash('errors', 'Произошла ошибка');
                print_r($model->getErrors());
            } else {
                $model->save();
<<<<<<< HEAD
                if (Yii::$app->user->id != User::USER_ADMIN) {
                    $notification->getByIdNotification(10, $id);
                    $notification->saveNotification;
                }
                Yii::$app->session->addFlash('update', 'Заказ успешно закрылся №' . $model->prefics);
            }

//        $this->view->params['notifications'] = Notification::find()->where(['id_user' => Yii::$app->user->id, 'active' => true])->all();

=======
                Yii::$app->session->addFlash('update', 'Заказ успешно закрылся №'.$model->prefics);
            }
        
        //        $this->view->params['notifications'] = Notification::find()->where(['id_user' => Yii::$app->user->id, 'active' => true])->all();
        
>>>>>>> origin/master
            if (Yii::$app->user->can('shop')) {
                return $this->redirect(['shop']);
            } elseif (Yii::$app->user->can('admin')) {
                return $this->redirect(['admin']);
            }
        }
    }

    public function actionRestore($id)
    {
        $model = $this->findModel($id);
        $model->action = 1;
<<<<<<< HEAD
=======
        $model->restoring = 1;
>>>>>>> origin/master
        $model->save();
        Yii::$app->session->addFlash('update', 'Заказ успешно активирован');

        return $this->redirect(['archive']);
    }

    /**
     * New zakaz become in status adopted
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAdopted($id)
    {
        $model = $this->findModel($id);
        $model->status = Zakaz::STATUS_ADOPTED;
<<<<<<< HEAD
        $model->statusUpdate = Zakaz::STATUS_ADOPTED_WORK;
        $model->save();
    }

    /**
     * New zakaz become in status adopted
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAdopupdate($id)
    {
        $model = $this->findModel($id);
        $model->statusUpdate = Zakaz::STATUS_ADOPTED_WORK;
=======
>>>>>>> origin/master
        $model->save();
    }

    /**
<<<<<<< HEAD
     * New zakaz become in status wokr for design
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAdopdesign($id)
    {
        $model = $this->findModel($id);
        $model->statusDesign = Zakaz::STATUS_DESIGNER_WORK;
=======
     * New zakaz become in status wokr for disain
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAdopdisain($id)
    {
        $model = $this->findModel($id);
        $model->statusDisain = Zakaz::STATUS_DISAINER_WORK;
>>>>>>> origin/master
        $model->save();
    }

    /**
     * New zakaz become in status wokr for master
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAdopmaster($id)
    {
        $model = $this->findModel($id);
        $model->statusMaster = Zakaz::STATUS_MASTER_WORK;
        $model->save();
    }

    /**
     * Zakaz fulfilled
     * if success then redirected zakaz/admin
     * @param $id
     * @return \yii\web\Response
     */
    public function actionFulfilled($id)
    {
        $model = $this->findModel($id);
        $model->status = Zakaz::STATUS_EXECUTE;
        $model->id_unread = 0;
<<<<<<< HEAD
            if ($model->save()) {
                Yii::$app->session->addFlash('update', 'Выполнен заказ №'.$model->prefics);
                return $this->redirect(['admin']);
            }else {
                print_r($model->getErrors());
                Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
            }
    }

    /**
     * Zakaz the designer
     * if success then redirected zakaz/design
=======
        if ($model->save()) {
            Yii::$app->session->addFlash('update', 'Выполнен заказ №'.$model->prefics);
            return $this->redirect(['admin']);
        } else {
            print_r($model->getErrors());
            Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
        }
    }

    /**
     * Zakaz the disainer
     * if success then redirected zakaz/disain
>>>>>>> origin/master
     * @param $id
     * @return \yii\web\Response
     */
    public function actionReconcilation($id)
    {
        $model = $this->findModel($id);

<<<<<<< HEAD
        if ($model->statusDesign == Zakaz::STATUS_DESIGNER_SOGLAS) {
            $model->statusDesign = Zakaz::STATUS_DESIGNER_WORK;
        } else {
            $model->statusDesign = Zakaz::STATUS_DESIGNER_SOGLAS;
        }
        if ($model->save()) {
            return $this->redirect(['design']);
=======
        if ($model->statusDisain == Zakaz::STATUS_DISAINER_SOGLAS) {
            $model->statusDisain = Zakaz::STATUS_DISAINER_WORK;
        } else {
            $model->statusDisain = Zakaz::STATUS_DISAINER_SOGLAS;
        }
        if ($model->save()) {
            return $this->redirect(['disain']);
>>>>>>> origin/master
        } else {
            print_r($model->getErrors());
        }
    }

    /**
     * All existing close zakaz in Admin
     * @return string
     */
    public function actionArchive()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'archive');
        $notification = $this->findNotification();

        return $this->render('archive', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'notification' => $notification,
        ]);
    }

    /** All close zakaz in shop */
    public function actionClosezakaz()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'closeshop');
        $notification = $this->findNotification();

        return $this->render('closezakaz', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'notification' => $notification,
        ]);
    }

<<<<<<< HEAD
    /** All fulfilled design */
=======
    /** All fulfilled disain */
>>>>>>> origin/master
    public function actionReady()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = new ActiveDataProvider([
<<<<<<< HEAD
            'query' => Zakaz::find()->andWhere(['status' => Zakaz::STATUS_SUC_DESIGN, 'action' => 1]),
=======
            'query' => Zakaz::find()->andWhere(['status' => Zakaz::STATUS_SUC_DISAIN, 'action' => 1]),
>>>>>>> origin/master
            'sort' => ['defaultOrder' => ['srok' => SORT_DESC]]
        ]);
        $notification = $this->findNotification();

        return $this->render('ready', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'notification' => $notification,
        ]);
    }

    /**
<<<<<<< HEAD
     * Design internal status zakaz
     * @param $id
     * @return \yii\web\Response
     */
    public function actionStatusdesign($id)
    {
        $model = $this->findModel($id);
        $model->statusDesign = Zakaz::STATUS_DESIGNER_WORK;
=======
     * Disain internal status zakaz
     * @param $id
     * @return \yii\web\Response
     */
    public function actionStatusdisain($id)
    {
        $model = $this->findModel($id);
        $model->statusDisain = Zakaz::STATUS_DISAINER_WORK;
>>>>>>> origin/master
        $model->save();

        return $this->redirect(['view', 'id' => $model->id_zakaz]);
    }

    /**
     * Deletes an existing Zakaz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /** START view role */
    /**
     * All zakaz existing in Shop
     * @return string
     */
    public function actionShop()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'shopWork');
        $dataProviderExecute = $searchModel->search(Yii::$app->request->queryParams, 'shopExecute');
        $notification = $this->findNotification();

        return $this->render('shop', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderExecute' => $dataProviderExecute,
            'notification' => $notification,
        ]);
    }
<<<<<<< HEAD
=======
    
>>>>>>> origin/master
    public function actionManager($id)
    {
        $searchModel = new ZakazSearch();
        $dataProvider  = $searchModel->searchmanager(Yii::$app->request->queryParams, 'shopWork', $id);
        $dataProviderExecute = $searchModel->searchmanager(Yii::$app->request->queryParams, 'shopExecute', $id);
        $notification = $this->findNotification();

        return $this->render('manager', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderExecute' => $dataProviderExecute,
            'notification' => $notification,
        ]);
    }

<<<<<<< HEAD

    /**
     * All zakaz existing in Design
     * @return string
     */
    public function actionDesign()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'design');
        $dataProviderSoglas = $searchModel->search(Yii::$app->request->queryParams, 'designSoglas');
        $notification = $this->findNotification();
        $dataProvider->pagination = false;

        return $this->render('design', [
=======
    /**
     * All zakaz existing in Disain
     * @return string
     */
    public function actionDisain()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'disain');
        $dataProviderSoglas = $searchModel->search(Yii::$app->request->queryParams, 'disainSoglas');
        $notification = $this->findNotification();
        $dataProvider->pagination = false;

        return $this->render('disain', [
>>>>>>> origin/master
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderSoglas' => $dataProviderSoglas,
            'notification' => $notification,
        ]);
    }
<<<<<<< HEAD

=======
    
>>>>>>> origin/master
    /**
     * All zakaz existing in Master
     * @return string
     */
    public function actionMaster()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'master');
        $dataProviderSoglas = $searchModel->search(Yii::$app->request->queryParams, 'masterSoglas');
        $notification = $this->findNotification();
        $dataProvider->pagination = false;

        return $this->render('master', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderSoglas' => $dataProviderSoglas,
            'notification' => $notification,
        ]);
    }

    /**
     * All zakaz existing in Admin
     * @return string|\yii\web\Response
     * windows Admin
     */
    public function actionAdmin()
    {
        $notification = $this->findNotification();
        $notifications = new Notification();
        $model = new Zakaz();
        $comment = new Comment();
        $telegram = new Telegram();
        $shipping = new Courier();
        $user = User::findOne(['id' => 7]);

        if ($comment->load(Yii::$app->request->post())) {
            if ($comment->save()) {
                return $this->redirect(['admin']);
            } else {
                print_r($comment->getErrors());
            }
        }

        if ($shipping->load(Yii::$app->request->post())) {
            $shipping->save();//сохранение доставка
            if (!$shipping->save()) {
                $this->flashErrors();
            }
            $model = Zakaz::findOne($shipping->id_zakaz);//Определяю заказ
            $model->id_shipping = $shipping->id;//Оформление доставку в таблице заказа
            if ($model->save()){
<<<<<<< HEAD
                if(Yii::$app->request->isAjax){
                    /** @var $model \app\models\Zakaz */
                    /*Yii::$app->session->addFlash('update', 'Доставка успешно создана');*/

                    $notifications->getByIdNotification(7, $shipping->id_zakaz);//оформление уведомлений
                    $notifications->saveNotification;
                }
=======
                /** @var $model \app\models\Zakaz */
                Yii::$app->session->addFlash('update', 'Доставка успешно создана');
>>>>>>> origin/master
               /* $telegram->message(User::USER_COURIER, 'Назначена доставка '.$model->prefics);*/
            } else {
                $this->flashErrors();
            }

<<<<<<< HEAD


           /* return $this->redirect(['admin', '#' => $model->id_zakaz]);*/
=======
            $notifications->getByIdNotification(7, $shipping->id_zakaz);//оформление уведомлений
            $notifications->saveNotification;

            return $this->redirect(['admin', '#' => $model->id_zakaz]);
>>>>>>> origin/master
        }

        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'admin');
<<<<<<< HEAD
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your analytics model for saving
            $bookId = Yii::$app->request->post('editableKey');
            $model = Zakaz::findOne($bookId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should only be one entry
            // anyway in this array for an editable submission)
            // - $posted is the posted data for AnalyticsReport without any indexes
            // - $post is the converted array for single model validation
            $posted = current($_POST['Zakaz']);
            $post = ['Zakaz' => $posted];

            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();

                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';

                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the AnalyticsReport model
                if (isset($posted['oplata'])) {
                    $output = Yii::$app->formatter->asDecimal($model->oplata, 2);
                }
                if (isset($posted['srok'])) {
                    $output = Yii::$app->formatter->asDatetime(strtotime($model->srok),  'php:d M H:i');
                }
                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                // $output = ''; // process as you need
                // }
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
=======
>>>>>>> origin/master
        $image = $model->img;

        $dataProviderNew = $searchModel->search(Yii::$app->request->queryParams, 'adminNew');
        $dataProviderWork = $searchModel->search(Yii::$app->request->queryParams, 'adminWork');
        $dataProviderIspol = $searchModel->search(Yii::$app->request->queryParams, 'adminIspol');
<<<<<<< HEAD

=======
       
>>>>>>> origin/master
        $dataProvider  ->sort->defaultOrder['srok']=SORT_ASC;
        $dataProviderNew  ->sort->defaultOrder['srok']=SORT_DESC;
        $dataProviderWork  ->sort->defaultOrder['srok']=SORT_ASC;
        $dataProviderIspol  ->sort->defaultOrder['srok']=SORT_ASC;
<<<<<<< HEAD

        $dataProviderNew->pagination = false;
        $dataProviderWork->pagination = false;
        $dataProviderIspol->pagination = false;
=======
        $dataProviderNew->pagination = false;
        $dataProviderWork->pagination = false;
      /*  $dataProviderIspol->pagination = false;*/
>>>>>>> origin/master
        $dataProvider->pagination = false;


        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderNew' => $dataProviderNew,
            'dataProviderWork' => $dataProviderWork,
            'dataProviderIspol' => $dataProviderIspol,
            'image' => $image,
            'shipping' => $shipping,
            'notification' => $notification,
        ]);
    }
    /** END view role */
    /** START Block admin in gridview */
    /**
<<<<<<< HEAD
     * Zakaz deckined admin and in db setup STATUS_DECLINED_DESIGN or STATUS_DECLINED_MASTER
=======
     * Zakaz deckined admin and in db setup STATUS_DECLINED_DISAIN or STATUS_DECLINED_MASTER
>>>>>>> origin/master
     * if success then redirected view admin
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDeclined($id)
    {
        $model = $this->findModel($id);
<<<<<<< HEAD
        $notification = new Notification();
        $model->scenario = Zakaz::SCENARIO_DECLINED;
        if ($model->status == Zakaz::STATUS_SUC_DESIGN) {
=======
        $model->scenario = Zakaz::SCENARIO_DECLINED;
        if ($model->status == Zakaz::STATUS_SUC_DISAIN) {
>>>>>>> origin/master
            $user_id = User::USER_DISAYNER;
        } else {
            $user_id = User::USER_MASTER;
        }
        $user = User::findOne(['id' => $user_id]);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
<<<<<<< HEAD
                if ($model->status == Zakaz::STATUS_SUC_DESIGN) {
                    $model->status = Zakaz::STATUS_DECLINED_DESIGN;
                    $model->statusDesign = Zakaz::STATUS_DESIGNER_DECLINED;
=======
                if ($model->status == Zakaz::STATUS_SUC_DISAIN) {
                    $model->status = Zakaz::STATUS_DECLINED_DISAIN;
                    $model->statusDisain = Zakaz::STATUS_DISAINER_DECLINED;
>>>>>>> origin/master
                    $model->id_unread = 0;
                } else {
                    $model->status = Zakaz::STATUS_DECLINED_MASTER;
                    $model->statusMaster = Zakaz::STATUS_MASTER_DECLINED;
                    $model->id_unread = 0;
                }
                if (!$model->save()) {
                    print_r($model->getErrors());
                    Yii::$app->session->addFlash('errors', 'Проищошла ошибка!');
                } else {
                    $model->save();
                    Yii::$app->session->addFlash('update', 'Работа была отклонена!');
                    try {
                        if($user->telegram_chat_id){
<<<<<<< HEAD
                            $notification->getByIdNotification(12, $id);
                            $notification->getSaveNotification();
=======
>>>>>>> origin/master
                           /* \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Отклонен заказ ' . $model->prefics . ' По причине: ' . $model->declined);   */
                        }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }
                }
                return $this->redirect(['admin', '#' => $model->id_zakaz]);
            } else {
                return $this->renderAjax('_declined', ['model' => $model]);
            }
        } else {
            return $this->renderAjax('_declined', ['model' => $model]);
        }
    }

<<<<<<< HEAD


=======
>>>>>>> origin/master
    /**
     * * Zakaz accept admin and in appoint
     * if success then redirected view admin
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAccept($id)
    {
        $model = $this->findModel($id);
<<<<<<< HEAD
        $notification = new Notification();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->status == Zakaz::STATUS_DESIGN or $model->status == Zakaz::STATUS_MASTER or $model->status == Zakaz::STATUS_AUTSORS) {
                    if ($model->status == Zakaz::STATUS_DESIGN) {
                        $model->statusDesign = Zakaz::STATUS_DESIGNER_NEW;
=======

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->status == Zakaz::STATUS_DISAIN or $model->status == Zakaz::STATUS_MASTER or $model->status == Zakaz::STATUS_AUTSORS) {
                    if ($model->status == Zakaz::STATUS_DISAIN) {
                        $model->statusDisain = Zakaz::STATUS_DISAINER_NEW;
>>>>>>> origin/master
                        $model->id_unread = 0;
                        $user_id = User::USER_DISAYNER;
                    } elseif ($model->status == Zakaz::STATUS_MASTER) {
                        $model->statusMaster = Zakaz::STATUS_MASTER_NEW;
                        $model->id_unread = 0;
                        $user_id = User::USER_MASTER;
                    } else {
                        $model->id_unread = 0;
                    }
                }
                if ($model->save()) {
<<<<<<< HEAD
                    if($model->status == Zakaz::STATUS_DESIGN){
=======
                    if($model->status == Zakaz::STATUS_DISAIN){
>>>>>>> origin/master
                        $user = User::findOne(['id' => $user_id]);
                        try{
                            Yii::$app->session->addFlash('update', 'Работа была принята');
                            if($user->telegram_chat_id){
<<<<<<< HEAD
                                $notification->getByIdNotification(4, $model->id_zakaz);
                                $notification->getSaveNotification();
=======
>>>>>>> origin/master
                               /* \Yii::$app->bot->sendMessage($user->telegram_chat_id, 'Назначен заказ '.$model->prefics.' '.$model->description);   */
                            }
                        }catch (Exception $e){
                            $e->getMessage();
                        }
                    }
                    return $this->redirect(['admin', 'id' => $id]);
                } else {
                    print_r($model->getErrors());
                    Yii::$app->session->addFlash('errors', 'Произошла ошибка!');
                }
            } else {
                return $this->renderAjax('accept', ['model' => $model]);
            }
        }
        return $this->renderAjax('accept', ['model' => $model]);
    }

    /**
     * Bloc view zakaz in Admin
     * @param $id
     * @return string
     */
    public function actionZakaz($id)
    {
        $model = $this->findModel($id);

        return $this->renderPartial('_zakaz', [
            'model' => $model,
        ]);
    }
    /** END Block admin in gridview*/
    /**
     * Finds the Zakaz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zakaz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zakaz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findShipping($id)
    {
        if (($shipping = Courier::findOne($id)) !== null) {
            return $shipping;
        } else {
            throw new NotFoundHttpException("The requested page does not exist.");

        }
    }

    protected function findNotification()
    {
        $notifModel = Notification::find();
        $notification = $notifModel->where(['id_user' => Yii::$app->user->id, 'active' => true]);
        if ($notification->count() > 50) {
            $notifications = '50+';
        } elseif ($notification->count() < 1) {
            $notifications = '';
        } else {
            $notifications = $notification->count();
        }

        $this->view->params['notifications'] = $notification->all();
        $this->view->params['count'] = $notifications;
    }
}
