<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

<<<<<<< HEAD
/**
 * AnaliticsSearch represents the model behind the search form about `app\models\Zakaz`.
 */

class AnalyticsSearch extends Zakaz
=======
class AnalyticsSearch extends AnalyticsReport
>>>>>>> origin/master

{
    public $search;

<<<<<<< HEAD
    public $date_from;
    public $date_to;

    const date_from = '23-Feb-1982 10:10';
    const date_to = '23-Feb-1982 10:10';
=======

    public static function tableName()
    {
        return 'book';
    }
>>>>>>> origin/master

    public function rules()
    {
        return [
<<<<<<< HEAD
            [['id_zakaz', 'id_shop'], 'integer'],
            [[ 'fact_oplata'], 'number'],
            [[ 'description', 'date_close','search',], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
=======
            [['name', 'buy_amount', 'book_color'], 'required'],
            [['buy_amount', 'book_color'], 'integer'],
            [['name'], 'string', 'max' => 255],
>>>>>>> origin/master
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
<<<<<<< HEAD

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $role)
    {

        $query = Zakaz::find();
        switch ($role) {
            case 'index':
                $query->where('action <= 0')->andWhere(['>=', 'date_close', '2018-08-01 00:00:00'])->andWhere(['<=', 'date_close', '2018-08-01 00:00:00']);
                break;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
=======
    public function search()
    {
        $query = AnalyticsReport::find();



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

>>>>>>> origin/master
        return $dataProvider;
    }

    public function attributeLabels()
    {
        return [
<<<<<<< HEAD
            'date_close' => 'date_close',
            'id_zakaz' => 'id_zakaz',
            'description' => 'description',
            'fact_oplata' => 'fact_oplata',
            'id_shop' => 'id_shop',
=======
            'id' => 'ID',
            'name' => 'Name',
            'buy_amount' => 'Buy Amount',
            'book_color' => 'AnalyticsReport Color',
>>>>>>> origin/master
        ];
    }

}

