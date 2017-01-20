<?php

use yii\db\Migration;

/**
 * Handles the creation of table `indicador`.
 */
class m170119_161300_create_indicador_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('indicador', [
            'id' => $this->primaryKey(),
            'iddump' => $this->integer()->notNull(),
            'idindicadortipo' => $this->integer()->notNull(),
            'descricao' => $this->string(200)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-indicador-iddump',
            'indicador',
            'iddump'
        );

        $this->addForeignKey(
            'fk-indicador-iddump',
            'indicador',
            'iddump',
            'dump',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-indicador-idindicadortipo',
            'indicador',
            'idindicadortipo'
        );

        $this->addForeignKey(
            'fk-indicador-idindicadortipo',
            'indicador',
            'idindicadortipo',
            'indicadortipo',
            'id',
            'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

        $this->dropForeignKey(
            'fk-indicador-iddump',
            'indicador'
        );

        $this->dropIndex(
            'idx-indicador-iddump',
            'indicador'
        );

        $this->dropForeignKey(
            'fk-indicador-idindicadortipo',
            'indicador'
        );
        
        $this->dropIndex(
            'idx-indicador-idindicadortipo',
            'indicador'
        );

        $this->dropTable('indicador');
    }
}
