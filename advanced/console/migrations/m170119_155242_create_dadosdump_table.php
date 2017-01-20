<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dadosdump`.
 */
class m170119_155242_create_dadosdump_table extends Migration
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
        
        $this->createTable('dadosdump', [
            'id' => $this->bigPrimaryKey(),
            'iddumpfk' => $this->integer()->notNull(),
            'campo1' => $this->string(200),
            'campo2' => $this->string(200),
            'campo3' => $this->string(200),
            'campo4' => $this->string(200),
            'campo5' => $this->string(200),
            'campo6' => $this->string(200),
            'campo7' => $this->string(200),
            'campo8' => $this->string(200),
            'campo9' => $this->string(200),
        ], $tableOptions);

        $this->createIndex(
            'idx-dadosdump-idDumpfk',
            'dadosdump',
            'iddumpfk'
        );

        $this->addForeignKey(
            'fk-dadosdump-iddumpfk',
            'dadosdump',
            'iddumpfk',
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
            'fk-dadosdump-iddumpfk',
            'dadosdump'
        );

        $this->dropIndex(
            'idx-dadosdump-idDumpfk',
            'dadosdump'
        );

        $this->dropTable('dadosdump');
    }
}
