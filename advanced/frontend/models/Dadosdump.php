<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dadosdump".
 *
 * @property integer $id
 * @property integer $iddumpfk
 * @property string $campo1
 * @property string $campo2
 * @property string $campo3
 * @property string $campo4
 * @property string $campo5
 * @property string $campo6
 * @property string $campo7
 * @property string $campo8
 * @property string $campo9
 *
 * @property Dump $iddumpfk0
 */
class Dadosdump extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dadosdump';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddumpfk'], 'required'],
            [['iddumpfk'], 'integer'],
            [['campo1', 'campo2', 'campo3', 'campo4', 'campo5', 'campo6', 'campo7', 'campo8', 'campo9'], 'string', 'max' => 100],
            [['iddumpfk'], 'exist', 'skipOnError' => true, 'targetClass' => Dump::className(), 'targetAttribute' => ['iddumpfk' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iddumpfk' => 'Iddumpfk',
            'campo1' => 'Campo1',
            'campo2' => 'Campo2',
            'campo3' => 'Campo3',
            'campo4' => 'Campo4',
            'campo5' => 'Campo5',
            'campo6' => 'Campo6',
            'campo7' => 'Campo7',
            'campo8' => 'Campo8',
            'campo9' => 'Campo9',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddumpfk0()
    {
        return $this->hasOne(Dump::className(), ['id' => 'iddumpfk']);
    }
}
