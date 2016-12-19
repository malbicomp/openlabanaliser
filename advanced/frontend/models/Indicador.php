<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicador".
 *
 * @property integer $id
 * @property integer $iddump
 * @property integer $idindicadortipo
 * @property string $descricao
 *
 * @property Grafico[] $graficos
 * @property Dump $iddump0
 * @property Indicador $idindicadortipo0
 * @property Indicador[] $indicadors
 * @property Mapeamentopseudocampo[] $mapeamentopseudocampos
 */
class Indicador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indicador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddump', 'idindicadortipo', 'descricao'], 'required'],
            [['iddump', 'idindicadortipo'], 'integer'],
            [['descricao'], 'string', 'max' => 100],
            [['iddump'], 'exist', 'skipOnError' => true, 'targetClass' => Dump::className(), 'targetAttribute' => ['iddump' => 'id']],
            [['idindicadortipo'], 'exist', 'skipOnError' => true, 'targetClass' => Indicador::className(), 'targetAttribute' => ['idindicadortipo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iddump' => 'Iddump',
            'idindicadortipo' => 'Idindicadortipo',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos()
    {
        return $this->hasMany(Grafico::className(), ['idindicador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddump0()
    {
        return $this->hasOne(Dump::className(), ['id' => 'iddump']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdindicadortipo0()
    {
        return $this->hasOne(Indicador::className(), ['id' => 'idindicadortipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadors()
    {
        return $this->hasMany(Indicador::className(), ['idindicadortipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapeamentopseudocampos()
    {
        return $this->hasMany(Mapeamentopseudocampo::className(), ['idindicador' => 'id']);
    }
}
