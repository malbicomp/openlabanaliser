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
            while (($dado = fgetcsv($handle, 1000, ";", ";")) !== FALSE) {
                $dadosdump = new Dadosdump();
                $dadosdump->iddumpfk = $this->id;
                $dadosdump->campo1 = $dado[0];
                $dadosdump->campo2 = $dado[1];
                $dadosdump->campo3 = $dado[2];
                $dadosdump->campo4 = $dado[3];
                $dadosdump->campo5 = $dado[4];
                $dadosdump->campo6 = $dado[5];
                $dadosdump->campo7 = $dado[6];
                $dadosdump->campo8 = $dado[7];
                $dadosdump->campo9 = $dado[7];
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
