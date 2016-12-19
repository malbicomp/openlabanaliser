<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "graficotipo".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 *
 * @property Grafico[] $graficos
 */
class Graficotipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'graficotipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos()
    {
        return $this->hasMany(Grafico::className(), ['idtipografico' => 'id']);
    }
}
