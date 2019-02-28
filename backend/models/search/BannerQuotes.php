<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BannerQuotes as BannerQuotesModel;

/**
 * BannerQuotes represents the model behind the search form of `backend\models\BannerQuotes`.
 */
class BannerQuotes extends BannerQuotesModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['quotes', 'name', 'company', 'photos', 'others_field'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = BannerQuotesModel::find();

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
        ]);

        $query->andFilterWhere(['like', 'quotes', $this->quotes])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'photos', $this->photos])
            ->andFilterWhere(['like', 'others_field', $this->others_field]);

        return $dataProvider;
    }
}
