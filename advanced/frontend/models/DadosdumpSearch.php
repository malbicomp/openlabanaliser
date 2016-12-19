<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dadosdump;

/**
 * DadosdumpSearch represents the model behind the search form about `app\models\Dadosdump`.
 */
class DadosdumpSearch extends Dadosdump
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iddumpfk'], 'integer'],
            [['campo1', 'campo2', 'campo3', 'campo4', 'campo5', 'campo6', 'campo7', 'campo8', 'campo9'], 'safe'],
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
        $query = Dadosdump::find();

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
            'iddumpfk' => $this->iddumpfk,
        ]);

        $query->andFilterWhere(['like', 'campo1', $this->campo1])
            ->andFilterWhere(['like', 'campo2', $this->campo2])
            ->andFilterWhere(['like', 'campo3', $this->campo3])
            ->andFilterWhere(['like', 'campo4', $this->campo4])
            ->andFilterWhere(['like', 'campo5', $this->campo5])
            ->andFilterWhere(['like', 'campo6', $this->campo6])
            ->andFilterWhere(['like', 'campo7', $this->campo7])
            ->andFilterWhere(['like', 'campo8', $this->campo8])
            ->andFilterWhere(['like', 'campo9', $this->campo9]);

        return $dataProvider;
    }
}
