<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mapeamentopseudocampo".
 *
 * @property integer $id
 * @property integer $idindicador
 * @property integer $idcampodump
 * @property integer $idpseudocampo
 *
 * @property Campodump $idcampodump0
 * @property Indicador $idindicador0
 * @property Pseudocampo $idpseudocampo0
 */
class Mapeamentopseudocampo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mapeamentopseudocampo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idindicador', 'idcampodump', 'idpseudocampo'], 'required'],
            [['idindicador', 'idcampodump', 'idpseudocampo'], 'integer'],
            [['idcampodump'], 'exist', 'skipOnError' => true, 'targetClass' => Campodump::className(), 'targetAttribute' => ['idcampodump' => 'id']],
            [['idindicador'], 'exist', 'skipOnError' => true, 'targetClass' => Indicador::className(), 'targetAttribute' => ['idindicador' => 'id']],
            [['idpseudocampo'], 'exist', 'skipOnError' => true, 'targetClass' => Pseudocampo::className(), 'targetAttribute' => ['idpseudocampo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idindicador' => 'Idindicador',
            'idcampodump' => 'Idcampodump',
            'idpseudocampo' => 'Idpseudocampo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcampodump0()
    {
        return $this->hasOne(Campodump::className(), ['id' => 'idcampodump']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdindicador0()
    {
        return $this->hasOne(Indicador::className(), ['id' => 'idindicador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpseudocampo0()
    {
        return $this->hasOne(Pseudocampo::className(), ['id' => 'idpseudocampo']);
    }
}
