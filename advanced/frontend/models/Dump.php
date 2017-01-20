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
 * @property Indicador[] $indicadores
 */
class Dump extends \yii\db\ActiveRecord
{
    public $fileCSV;
    public $fileCSVName;

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
            [['qteCampos'], 'integer'],
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
            'campodumps' => 'Qte de Campos no Dump',
            'dadosdump' => 'Qte de Dados no Dump'
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
    public function getIndicadores()
    {
        return $this->hasMany(Indicador::className(), ['iddump' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (($handle = fopen('CSV/'.$this->fileCSVName, "r")) !== FALSE){
            $dado = explode(';', fgets($handle));
            $this->qteCampos = count($dado);
            rewind($handle);
            fclose($handle);
            return true;
        }else{
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (($handle = fopen('CSV/'.$this->fileCSVName, "r")) !== FALSE) {
            while (($dado = fgets($handle)) !== FALSE) {
                $dado = explode(';', $dado);
                $dadosdump = new Dadosdump();
                $dadosdump->iddumpfk = $this->id;
                for($i=0 ; $i < $this->qteCampos; $i++){
                    $campox = 'campo'.($i+1);
                    $dadosdump->$campox = $dado[$i]; 
                }
                if (!$dadosdump->save())
                    return false;
            }

            fclose($handle);
            unlink('CSV/'.$this->fileCSVName);
        }else{
            return false;
        }
    }

    public function beforeDelete()
    {
        Campodump::deleteAll(['idDump' => $this->id]);
        Dadosdump::deleteAll(['iddumpfk' => $this->id]);
        Indicador::deleteAll(['iddump' => $this->id]);
        return true;
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
