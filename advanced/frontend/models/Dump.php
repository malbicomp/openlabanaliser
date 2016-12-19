<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dump".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 *
 * @property Campodump[] $campodumps
 * @property Dadosdump[] $dadosdumps
 * @property Indicador[] $indicadors
 */
class Dump extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dump';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 200],
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
    public function getCampodumps()
    {
        return $this->hasMany(Campodump::className(), ['idDump' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosdumps()
    {
        return $this->hasMany(Dadosdump::className(), ['iddumpfk' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadors()
    {
        return $this->hasMany(Indicador::className(), ['iddump' => 'id']);
    }
}
