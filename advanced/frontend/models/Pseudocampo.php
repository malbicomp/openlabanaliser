<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pseudocampo".
 *
 * @property integer $id
 * @property integer $idindicadortipo
 * @property string $nome
 * @property string $descricao
 *
 * @property Grafico[] $graficos
 * @property Grafico[] $graficos0
 * @property Grafico[] $graficos1
 * @property Grafico[] $graficos2
 * @property Mapeamentopseudocampo[] $mapeamentopseudocampos
 * @property Indicadortipo $idindicadortipo0
 */
class Pseudocampo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pseudocampo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idindicadortipo', 'nome', 'descricao'], 'required'],
            [['idindicadortipo'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
            [['idindicadortipo'], 'exist', 'skipOnError' => true, 'targetClass' => Indicadortipo::className(), 'targetAttribute' => ['idindicadortipo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idindicadortipo' => 'Idindicadortipo',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos()
    {
        return $this->hasMany(Grafico::className(), ['pseudocampoidentidade' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos0()
    {
        return $this->hasMany(Grafico::className(), ['x' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos1()
    {
        return $this->hasMany(Grafico::className(), ['y' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraficos2()
    {
        return $this->hasMany(Grafico::className(), ['z' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapeamentopseudocampos()
    {
        return $this->hasMany(Mapeamentopseudocampo::className(), ['idpseudocampo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdindicadortipo0()
    {
        return $this->hasOne(Indicadortipo::className(), ['id' => 'idindicadortipo']);
    }
}
