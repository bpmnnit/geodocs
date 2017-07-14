<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Regions;

/**
 * RegionsSearch represents the model behind the search form about `backend\models\Regions`.
 */
class RegionsSearch extends Regions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id'], 'integer'],
            [['region_name', 'region_description', 'region_create_date'], 'safe'],
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
        $query = Regions::find();

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
            'region_id' => $this->region_id,
            'region_create_date' => $this->region_create_date,
        ]);

        $query->andFilterWhere(['like', 'region_name', $this->region_name])
            ->andFilterWhere(['like', 'region_description', $this->region_description]);

        return $dataProvider;
    }
}
