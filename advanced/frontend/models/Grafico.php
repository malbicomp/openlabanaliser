<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grafico".
 *
 * @property integer $id
 * @property integer $idindicador
 * @property integer $idtipografico
 * @property string $multiplot
 * @property integer $pseudocampoidentidade
 * @property integer $x
 * @property integer $y
 * @property integer $z
 *
 * @property Indicador $idindicador0
 * @property Graficotipo $idtipografico0
 * @property Pseudocampo $pseudocampoidentidade0
 * @property Pseudocampo $x0
 * @property Pseudocampo $y0
 * @property Pseudocampo $z0
 */
class Grafico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grafico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idindicador', 'idtipografico', 'multiplot', 'pseudocampoidentidade', 'x', 'y', 'z'], 'required'],
            [['idindicador', 'idtipografico', 'pseudocampoidentidade', 'x', 'y', 'z'], 'integer'],
            [['multiplot'], 'string', 'max' => 1],
            [['idindicador'], 'exist', 'skipOnError' => true, 'targetClass' => Indicador::className(), 'targetAttribute' => ['idindicador' => 'id']],
            [['idtipografico'], 'exist', 'skipOnError' => true, 'targetClass' => Graficotipo::className(), 'targetAttribute' => ['idtipografico' => 'id']],
            [['pseudocampoidentidade'], 'exist', 'skipOnError' => true, 'targetClass' => Pseudocampo::className(), 'targetAttribute' => ['pseudocampoidentidade' => 'id']],
            [['x'], 'exist', 'skipOnError' => true, 'targetClass' => Pseudocampo::className(), 'targetAttribute' => ['x' => 'id']],
            [['y'], 'exist', 'skipOnError' => true, 'targetClass' => Pseudocampo::className(), 'targetAttribute' => ['y' => 'id']],
            [['z'], 'exist', 'skipOnError' => true, 'targetClass' => Pseudocampo::className(), 'targetAttribute' => ['z' => 'id']],
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
            'idtipografico' => 'Idtipografico',
            'multiplot' => 'Multiplot',
            'pseudocampoidentidade' => 'Pseudocampoidentidade',
            'x' => 'X',
            'y' => 'Y',
            'z' => 'Z',
        ];
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
    public function getIdtipografico0()
    {
        return $this->hasOne(Graficotipo::className(), ['id' => 'idtipografico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPseudocampoidentidade0()
    {
        return $this->hasOne(Pseudocampo::className(), ['id' => 'pseudocampoidentidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getX0()
    {
        return $this->hasOne(Pseudocampo::className(), ['id' => 'x']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getY0()
    {
        return $this->hasOne(Pseudocampo::className(), ['id' => 'y']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZ0()
    {
        return $this->hasOne(Pseudocampo::className(), ['id' => 'z']);
    }
}
