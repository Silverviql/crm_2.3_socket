<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Courier;

/**
 * CourierSearch represents the model behind the search form about `app\models\Courier`.
 */
class CourierSearch extends Courier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_zakaz'], 'integer'],
            [['to', 'data_to', 'from', 'data_from'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Courier::find();
        $query->andWhere(['data_from' => null]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_zakaz' => $this->id_zakaz,
            'data_to' => $this->data_to,
            'data_from' => $this->data_from,
        ]);

        $query->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'from', $this->from]);

        return $dataProvider;
    }
}
