<?php

namespace app\models\client;

use Yii;

/**
 * This is the model class for table "close_cashbox".
 *
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $surname
 * @property integer $cash_on_cashbox
 * @property integer $cash_on_check
 * @property integer $non_cash
 * @property integer $payment_from_cashbox
 * @property string $to_which_payment
 * @property integer $refunds
 * @property integer $balance_in_cashbox
 * @property integer $attendance
 */
class CloseCashbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'close_cashbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['name', 'surname', 'cash_on_cashbox', 'cash_on_check', 'non_cash', 'to_which_payment', 'refunds', 'balance_in_cashbox', 'attendance'], 'required'],
            [['cash_on_cashbox', 'cash_on_check', 'non_cash', 'payment_from_cashbox', 'refunds', 'balance_in_cashbox', 'attendance'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['to_which_payment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'name' => 'Name',
            'surname' => 'Surname',
            'cash_on_cashbox' => 'Cash On Cashbox',
            'cash_on_check' => 'Cash On Check',
            'non_cash' => 'Non Cash',
            'payment_from_cashbox' => 'Payment From Cashbox',
            'to_which_payment' => 'To Which Payment',
            'refunds' => 'Refunds',
            'balance_in_cashbox' => 'Balance In Cashbox',
            'attendance' => 'Attendance',
        ];
    }
}
