<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Documents;
use common\models\User;

/**
 * DocumentsSearch represents the model behind the search form about `backend\models\Documents`.
 */
class DocumentsSearch extends Documents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id'], 'integer'],
            [['document_name', 'document_user', 'document_description', 'document_issue_date', 'document_create_date', 'document_type', 'document_url'], 'safe'],
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
        $query = Documents::find();

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

        $query->joinWith('documentUser');

        // grid filtering conditions
        $query->andFilterWhere([
            //'document_id' => $this->document_id,
            'document_issue_date' => $this->document_issue_date,
            'document_create_date' => $this->document_create_date,
            //'document_user' => $this->document_user,
        ]);

        $query->andFilterWhere(['like', 'document_name', $this->document_name])
            //->andFilterWhere(['like', 'document_description', $this->document_description])
            ->andFilterWhere(['=', 'document_type', $this->document_type])
            ->andFilterWhere(['like', 'document_url', $this->document_url])
            ->andFilterWhere(['like', 'user.name', $this->document_user]);

        return $dataProvider;
    }
}
