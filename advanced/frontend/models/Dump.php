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
    public $fileCSV;
    public $fileCSVName;

    public $cont;

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
            [['fileCSV'], 'file', 'skipOnEmpty' => false],
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

    public function afterSave($insert, $changedAttributes)
    {
        if (($handle = fopen('CSV/'.$this->fileCSVName, "r")) !== FALSE) {
            $dado = explode(';', fgets($handle));
            $qteCampo = count($dado);
            rewind($handle);
            while (($dado = fgets($handle)) !== FALSE) {
                $dado = explode(';', $dado);
                $dadosdump = new Dadosdump();
                $dadosdump->iddumpfk = $this->id;
                for($i=0;$i<$qteCampo;$i++){
                    $campox = 'campo'.($i+1);
                    $dadosdump->$campox = $dado[$i]; 
                }
                if (!$dadosdump->save())
                    return false;
            }

            fclose($handle);
        }else{
            return false;
        }
    }

    /*
    * Upload file CSV
    */
    public function upload()
    {
        if ($this->validate()) {
            $this->fileCSVName = time() . '.' . $this->fileCSV->extension;
            $this->fileCSV->saveAs('CSV/' . $this->fileCSVName);
            return true;
        } else {
            return false;
        }
    }
}
