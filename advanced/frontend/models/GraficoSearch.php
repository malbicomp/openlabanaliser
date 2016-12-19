<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grafico;

/**
 * GraficoSearch represents the model behind the search form about `app\models\Grafico`.
 */
class GraficoSearch extends Grafico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idindicador', 'idtipografico', 'pseudocampoidentidade', 'x', 'y', 'z'], 'integer'],
            [['multiplot'], 'safe'],
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
        $query = Grafico::find();

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
            'idindicador' => $this->idindicador,
            'idtipografico' => $this->idtipografico,
            'pseudocampoidentidade' => $this->pseudocampoidentidade,
            'x' => $this->x,
            'y' => $this->y,
            'z' => $this->z,
        ]);

        $query->andFilterWhere(['like', 'multiplot', $this->multiplot]);

        return $dataProvider;
    }
}
