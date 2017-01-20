<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pseudocampo`.
 */
class m170119_164745_create_pseudocampo_table extends Migration
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
        
        $this->createTable('pseudocampo', [
            'id' => $this->primaryKey(),
            'idindicadortipo' => $this->integer()->notNull(),
            'nome' => $this->string(50)->notNull(),
            'descricao' => $this->string(200)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-pseudocampo-idindicadortipo',
            'pseudocampo',
            'idindicadortipo'
        );

        $this->addForeignKey(
            'fk-pseudocampo-idindicadortipo',
            'pseudocampo',
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
            'fk-pseudocampo-idindicadortipo',
            'pseudocampo'
        );
        
        $this->dropIndex(
            'idx-pseudocampo-idindicadortipo',
            'pseudocampo'
        );

        $this->dropTable('pseudocampo');
    }
}
