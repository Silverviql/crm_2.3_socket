<?php

namespace app\models;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $name
<<<<<<< HEAD
=======
 * @property integer $salary
>>>>>>> origin/master
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
<<<<<<< HEAD
=======
            [['salary'], 'integer'],
>>>>>>> origin/master
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
<<<<<<< HEAD
=======
            'salary' => 'Оклад',
>>>>>>> origin/master
        ];
    }
}
