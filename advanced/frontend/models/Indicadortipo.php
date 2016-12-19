<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicadortipo".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property string $consultasql
 *
 * @property Pseudocampo[] $pseudocampos
 */
class Indicadortipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indicadortipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'consultasql'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
            [['consultasql'], 'string', 'max' => 1000],
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
            'consultasql' => 'Consultasql',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPseudocampos()
    {
        return $this->hasMany(Pseudocampo::className(), ['idindicadortipo' => 'id']);
    }
}
