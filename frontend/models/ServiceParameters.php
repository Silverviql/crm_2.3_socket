<?php

namespace app\models;


/**
 * This is the model class for table "service_parameters".
 *
 * @property integer $id
 * @property string $title
 * @property integer $id_service
 */
class ServiceParameters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_parameters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'id_service'], 'required'],
            [['id_service'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'id_service' => 'Id Service',
        ];
    }
}
