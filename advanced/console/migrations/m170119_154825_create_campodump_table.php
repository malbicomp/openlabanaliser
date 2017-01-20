<?php

use yii\db\Migration;

/**
 * Handles the creation of table `campodump`.
 */
class m170119_154825_create_campodump_table extends Migration
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
        
        $this->createTable('campodump', [
            'id' => $this->primaryKey(),
            'idDump' => $this->integer()->notNull(),
            'nome' => $this->string(50)->notNull(),
            'descricao' => $this->string(200)->notNull(),
            'campofisicodump' => $this->integer()->notNull(),
            'tipoCampo' => $this->string(50)->notNull(),
        ], $tableOptions);


        $this->createIndex(
            'idx-campodump-idDump',
            'campodump',
            'idDump'
        );

        $this->addForeignKey(
            'fk-campodump-idDump',
            'campodump',
            'idDump',
            'dump',
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
            'fk-campodump-idDump',
            'campodump'
        );

        $this->dropIndex(
            'idx-campodump-idDump',
            'campodump'
        );

        $this->dropTable('campodump');
    }
}
