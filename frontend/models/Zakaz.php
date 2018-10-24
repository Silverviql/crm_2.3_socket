<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "zakaz".
 *
 * @property integer $id_zakaz
 * @property string $srok
 * @property integer $minut
 * @property integer $id_sotrud
 * @property integer $id_shop
 * @property string $sotrud_name
 * @property integer $prioritet
 * @property integer $status
 * @property integer $action
 * @property integer $id_tovar
 * @property double $oplata
 * @property double $fact_oplata
 * @property integer $number
 * @property string $data
 * @property string $description
 * @property string $information
 * @property string $img
 * @property string $maket
 * @property integer $time
 * @property integer $id_autsors
<<<<<<< HEAD
 * @property integer $statusDesign
 * @property integer $statusMaster
 * @property integer $statusUpdate
 * @property string $name
 * @property integer $phone
 * @property string $email
=======
 * @property integer $statusDisain
 * @property integer $statusMaster
 * @property integer $restoring
 * @property string $name
 * @property integer $phone
 * @property string $email
 * @property integer $id_shipping
>>>>>>> origin/master
 * @property string $declined
 * @property integer $id_unread
 * @property string $temporary_img
 * @property string $temporary_maket
 * @property string $date_update
 * @property string $date_close
<<<<<<< HEAD
 * @property string $service_params
 * @property integer $restoring
 * @property integer $interior
 * @property string $term_accept
=======
 * @property integer $interior
 *
>>>>>>> origin/master
 * @property Courier[] $couriers
 * @property Todoist[] $todoists
 * @property Tovar $idTovar
 * @property User $idSotrud
 * @property Courier $idShipping
<<<<<<< HEAD
 *
=======
>>>>>>> origin/master
 */
class Zakaz extends ActiveRecord
{
    public $file;
    public $search;
<<<<<<< HEAD
    public $srok_date;
    public $srok_time;

=======
>>>>>>> origin/master

    const STATUS_NEW = 0;
    const STATUS_EXECUTE = 1;
    const STATUS_ADOPTED = 2;
<<<<<<< HEAD
    const STATUS_DESIGN = 3;
    const STATUS_SUC_DESIGN = 4;
=======
    const STATUS_DISAIN = 3;
    const STATUS_SUC_DISAIN = 4;
>>>>>>> origin/master
    const STATUS_REJECT = 5;
    const STATUS_MASTER = 6;
    const STATUS_SUC_MASTER = 7;
    const STATUS_AUTSORS = 8;
<<<<<<< HEAD
    const STATUS_DECLINED_DESIGN = 9;
    const STATUS_DECLINED_MASTER = 10;

    const STATUS_DESIGNER_NEW = 0;
    const STATUS_DESIGNER_WORK = 1;
    const STATUS_DESIGNER_SOGLAS = 2;
    const STATUS_DESIGNER_PROCESS = 3;
    const STATUS_DESIGNER_DECLINED = 4;
    const STATUS_DESIGNER_UPDATE = 5;
=======
    const STATUS_DECLINED_DISAIN = 9;
    const STATUS_DECLINED_MASTER = 10;

    const STATUS_DISAINER_NEW = 0;
    const STATUS_DISAINER_WORK = 1;
    const STATUS_DISAINER_SOGLAS = 2;
    const STATUS_DISAINER_PROCESS = 3;
    const STATUS_DISAINER_DECLINED = 4;
>>>>>>> origin/master

    const STATUS_MASTER_NEW = 0;
    const STATUS_MASTER_WORK = 1;
    const STATUS_MASTER_PROCESS = 2;
    const STATUS_MASTER_DECLINED = 3;
<<<<<<< HEAD
    const STATUS_MASTER_UPDATE = 5;

    const STATUS_UPDATE_ADMIN = 0;
    const STATUS_UPDATE_SHOP = 1;
    const STATUS_ADOPTED_WORK = 2;

=======
>>>>>>> origin/master

    const SCENARIO_DECLINED = 'declined';
    const SCENARIO_DEFAULT  = 'default';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DECLINED => ['declined', 'required'],
<<<<<<< HEAD
            self::SCENARIO_DEFAULT => ['srok', 'number', 'description', 'phone', 'id_sotrud', 'id_shop', 'sotrud_name', 'status', 'id_tovar', 'oplata', 'fact_oplata', 'number', 'id_autsors','statusDesign', 'statusMaster','statusUpdate', 'img', 'id_shipping', 'id_tovar', 'id_unread', 'information', 'data', 'prioritet', 'phone', 'email', 'name', 'maket', 'time', 'temporary_img', 'temporary_maket', 'date_update','srok_date','srok_time','service_params', 'term_accept'],
=======
            self::SCENARIO_DEFAULT => ['srok', 'number', 'description', 'phone', 'id_sotrud', 'id_shop', 'sotrud_name', 'status', 'id_tovar', 'oplata', 'fact_oplata', 'number',
            'id_autsors','statusDisain', 'statusMaster', 'img', 'id_shipping', 'id_tovar', 'id_unread', 'information', 'data', 'prioritet', 'phone', 'email', 'name', 'maket',
            'time', 'temporary_img', 'temporary_maket', 'date_update','restoring','interior'],
>>>>>>> origin/master
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [[ 'number', 'description', 'phone'], 'required', 'on' => self::SCENARIO_DEFAULT],
            ['declined', 'required', 'message' => 'Введите причину отказа', 'on'=> self::SCENARIO_DECLINED],
            [['id_zakaz', 'id_tovar', 'minut', 'time', 'number', 'status', 'action', 'id_sotrud', 'id_shop', 'phone', 'id_shipping' ,'prioritet', 'id_autsors','statusDesign', 'statusMaster','statusUpdate', 'id_unread', 'date_update', 'restoring','interior'], 'integer'],
            [['srok', 'data', 'data-start-design','date_close','srok_date','srok_time', 'term_accept'], 'safe'],
=======
            [['srok', 'number', 'description', 'phone'], 'required', 'on' => self::SCENARIO_DEFAULT],
            ['declined', 'required', 'message' => 'Введите причину отказа', 'on'=> self::SCENARIO_DECLINED],
            [['id_zakaz', 'id_tovar', 'minut', 'time', 'number', 'status', 'action', 'id_sotrud', 'id_shop', 'phone', 'id_shipping' ,'prioritet', 'id_autsors','statusDisain', 'statusMaster', 'id_unread', 'date_update','restoring'], 'integer'],
            [['srok', 'data', 'data-start-disain','date_close'], 'safe'],
>>>>>>> origin/master
            [['oplata', 'fact_oplata'], 'filter', 'filter' => function($value){
                return str_replace(' ', '', $value);
            }],
            [['oplata', 'fact_oplata'], 'number'],
<<<<<<< HEAD
            [['information', 'search', 'declined','service_params'], 'string'],
=======
            [['information', 'search', 'declined'], 'string'],
>>>>>>> origin/master
            ['prioritet', 'default', 'value' => 0],
            ['status', 'default', 'value' => self::STATUS_NEW],
            [['id_sotrud', 'id_shop'], 'default', 'value' => Yii::$app->user->getId()],
            ['data', 'default', 'value' => date('Y-m-d H:i:s')],
            [['description'], 'string', 'max' => 500],
            [['email', 'name', 'img', 'maket', 'sotrud_name'],'string', 'max' => 50],
            [['temporary_img', 'temporary_maket'],'string', 'max' => 86],
            [['file'], 'file', 'skipOnEmpty' => true],
            [['id_sotrud'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_sotrud' => 'id']],
            [['id_tovar'], 'exist', 'skipOnError' => true, 'targetClass' => Tovar::className(), 'targetAttribute' => ['id_tovar' => 'id']],
            [['id_shipping'], 'exist', 'skipOnError' => true, 'targetClass' => Courier::className(), 'targetAttribute' => ['id_shipping' => 'id']],
<<<<<<< HEAD
=======
            // [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
>>>>>>> origin/master
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_zakaz' => '№',
            'srok' => 'Срок',
            'minut' => 'Часы',
            'id_sotrud' => 'Магазин',
            'sotrud_name' => 'Сотрудник',
            'prioritet' => 'Приоритет',
            'status' => 'Этап',
            'id_tovar' => 'Категория',
            'oplata' => 'Всего',
            'fact_oplata' => 'Оплачено',
            'number' => 'Количество',
            'data' => 'Дата принятия',
            'description' => 'Описание',
            'img' => 'Приложение',
            'time' => 'Рекомендуемое время',
            'maket' => 'Макет дизайнера',
            'id_autsors' => 'Id Autsors',
<<<<<<< HEAD
            'statusDesign' => 'Этап',
            'statusMaster' => 'Этап',
            'statusUpdate' => 'Обновление',
=======
            'statusDisain' => 'Этап',
            'statusMaster' => 'Этап',
>>>>>>> origin/master
            'file' => 'Файл',
            'information' => 'Дополнительная информация',
            'name' => 'Клиент',
            'phone' => 'Телефон',
            'email' => 'Email',
            'id_shipping' => 'Доставка',
<<<<<<< HEAD
            'restoring' => 'Восстановленый',
=======
>>>>>>> origin/master
            'declined' => 'Причина отказа',
            'id_unread' => 'Id unread',
            'temporary_img' => 'Temporary img',
            'temporary_maket' => 'Temporary Maket',
            'date_update' => 'Date Update',
            'search' => 'Search',
            'date_close' => 'Дата закрытия',
<<<<<<< HEAD
            'srok_date' => 'Дата у срока',
            'srok_time' => 'Время у срока',
            'service_params' => 'service_params',
            'interior' => 'Внутренний заказ',
            'term_accept'=> 'term_accept',
=======
            'interior' => 'Внутренний заказ',
>>>>>>> origin/master
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSotrud()
    {
        return $this->hasOne(User::className(), ['id' => 'id_sotrud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTovar()
    {
        return $this->hasOne(Tovar::className(), ['id' => 'id_tovar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdShipping()
    {
        return $this->hasOne(Courier::className(), ['id' => 'id_shipping']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutsors()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_autsors']);
    }

    public static function getStatusArray(){
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_EXECUTE => 'Исполнен',
            self::STATUS_ADOPTED => 'Принят',
<<<<<<< HEAD
            self::STATUS_DESIGN => 'Дизайнер',
            self::STATUS_SUC_DESIGN => 'Дизайнер',
            self::STATUS_DECLINED_DESIGN => 'Дизайнер',
=======
            self::STATUS_DISAIN => 'Дизайнер',
            self::STATUS_SUC_DISAIN => 'Дизайнер',
            self::STATUS_DECLINED_DISAIN => 'Дизайнер',
>>>>>>> origin/master
            self::STATUS_REJECT => 'Отклонен',
            self::STATUS_MASTER => 'Мастер',
            self::STATUS_SUC_MASTER => 'Мастер',
            self::STATUS_DECLINED_MASTER => 'Мастер',
            self::STATUS_AUTSORS => 'Аутсорс',
        ];
    }
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusArray(), $this->status);
    }
    public static function getPrioritetArray()
    {
        return [
            '0' => '',
            '1' => 'важно',
            '2' => 'очень важно',
        ];
    }
    public function getPrioritetName()
    {
        return ArrayHelper::getValue(self::getPrioritetArray(), $this->prioritet);
    }
<<<<<<< HEAD
    public static function getStatusDesignArray()
    {
        return [
            self::STATUS_DESIGNER_NEW => 'Новый',
            self::STATUS_DESIGNER_WORK => 'В работе',
            self::STATUS_DESIGNER_SOGLAS => 'Согласование',
            self::STATUS_DESIGNER_PROCESS => 'На проверке',
            self::STATUS_DESIGNER_DECLINED => 'Отклонен',
            self::STATUS_DESIGNER_UPDATE => 'Отредактирован',
        ];
    }
    public function getStatusDesignName()
    {
        return ArrayHelper::getValue(self::getStatusDesignArray(), $this->statusDesign);
    }
    public static function getStatusMasterArray()
{
    return [
        self::STATUS_MASTER_NEW => 'Новый',
        self::STATUS_MASTER_WORK => 'В работе',
        self::STATUS_MASTER_PROCESS => 'На проверке',
        self::STATUS_MASTER_DECLINED => 'Отклонен',
        self::STATUS_MASTER_UPDATE => 'Отредактирован',
    ];
}
=======
    public static function getStatusDisainArray()
    {
        return [
            self::STATUS_DISAINER_NEW => 'Новый',
            self::STATUS_DISAINER_WORK => 'В работе',
            self::STATUS_DISAINER_SOGLAS => 'Согласование',
            self::STATUS_DISAINER_PROCESS => 'На проверке',
            self::STATUS_DISAINER_DECLINED => 'Отклонен',
        ];
    }
    public function getStatusDisainName()
    {
        return ArrayHelper::getValue(self::getStatusDisainArray(), $this->statusDisain);
    }
    public static function getStatusMasterArray()
    {
        return [
            self::STATUS_MASTER_NEW => 'Новый',
            self::STATUS_MASTER_WORK => 'В работе',
            self::STATUS_MASTER_PROCESS => 'На проверке',
            self::STATUS_MASTER_DECLINED => 'Отклонен',
        ];
    }
>>>>>>> origin/master
    public function getStatusMasterName()
    {
        return ArrayHelper::getValue(self::getStatusMasterArray(), $this->statusMaster);
    }

    /**
     * @param $id
     * @return bool
     */
    public function upload($action, $id = null)
    {
        $year = date('Y');
        $month = date('F');
        if (!is_dir('attachment/' . $year)) {
            mkdir('attachment/' . $year);
        }
        if (!is_dir('attachment/' . $year . '/' . $month)) {
            mkdir('attachment/' . $year . '/' . $month);
        }
        if (!is_dir('attachment/' . $year . '/' . $month.'/customer')) {
            mkdir('attachment/' . $year . '/' . $month.'/customer');
        }
        if($action == 'create'){
            $this->file->saveAs('attachment/' . $year . '/' . $month.'/customer/'.time().'.'.$this->file->extension);
            $this->img = 'attachment/' . $year . '/' . $month.'/customer/'.time() . '.' . $this->file->extension;
            $this->temporary_img = 'attachment/' . $year . '/' . $month.'/customer/'.time() . '.' . $this->file->extension;
        } else {
            $this->file->saveAs('attachment/' . $year . '/' . $month.'/customer/'.$id.'.'.$this->file->extension);
            $this->img = 'attachment/' . $year . '/' . $month.'/customer/'.$id . '.' . $this->file->extension;
            $this->temporary_img = 'attachment/' . $year . '/' . $month.'/customer/'.$id . '.' . $this->file->extension;
        }
    }
    public static function getPreficsList()
    {
        return [
            User::USER_MOSCOW => 'M',
            User::USER_PUSHKIN => 'P',
            '8' => 'T',
            User::USER_SIBER => 'S',
<<<<<<< HEAD
            User::USER_MARKX => 'K',
            User::USER_CHETAEVA => 'C'
=======
            User::USER_MARKX => 'X',
            User::USER_CHETAEVA => 'C',
            User::USER_KALININA => 'K'
>>>>>>> origin/master
        ];
    }
    
    /**
     * @return string
     */
    public function getMoney()
    {
        return number_format($this->oplata, 0,',', ' ').' р.';
    }

    public function getPrefics()
    {
        $list = self::getPreficsList();
        return (isset($list[$this->id_sotrud])) ? $list[$this->id_sotrud].'-'.$this->id_zakaz :         $this->id_zakaz;
    }
    public function getUploadeFile()
    {
        $year = date('Y');
        $month = date('F');
        if (!is_dir('attachment/' . $year)) {
            mkdir('attachment/' . $year);
        }
        if (!is_dir('attachment/' . $year . '/' . $month)) {
            mkdir('attachment/' . $year . '/' . $month);
        }
        if (!is_dir('attachment/' . $year . '/' . $month.'/layout')) {
            mkdir('attachment/' . $year . '/' . $month.'/layout');
        }
        //Выполнена работа дизайнером
<<<<<<< HEAD
=======
            // $this->file->saveAs('attachment/'.$year.'/'.$month.'/layout/Maket_'.$this->id_zakaz.'.'.$this->file->extension);
>>>>>>> origin/master
            $this->file->saveAs('attachment/'.$year.'/'.$month.'/layout/Maket_'.$this->id_zakaz.'.'.$this->file->extension);
            $this->maket = 'attachment/'.$year.'/'.$month.'/layout/Maket_'.$this->id_zakaz.'.'.$this->file->extension;
            $this->temporary_maket = 'attachment/'.$year.'/'.$month.'/layout/Maket_'.$this->id_zakaz.'.'.$this->file->extension;
            $this->status = 4;
    }
    
}
