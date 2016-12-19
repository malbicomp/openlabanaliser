<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campodump".
 *
 * @property integer $id
 * @property integer $idDump
 * @property string $nome
 * @property string $descricao
 * @property integer $campofisicodump
 *
 * @property Dump $idDump0
 * @property Mapeamentopseudocampo[] $mapeamentopseudocampos
 */
class Campodump extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campodump';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDump', 'nome', 'descricao', 'campofisicodump'], 'required'],
            [['idDump', 'campofisicodump'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
            [['idDump'], 'exist', 'skipOnError' => true, 'targetClass' => Dump::className(), 'targetAttribute' => ['idDump' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idDump' => 'Id Dump',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'campofisicodump' => 'Campofisicodump',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDump0()
    {
        return $this->hasOne(Dump::className(), ['id' => 'idDump']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapeamentopseudocampos()
    {
        return $this->hasMany(Mapeamentopseudocampo::className(), ['idcampodump' => 'id']);
    }
}
