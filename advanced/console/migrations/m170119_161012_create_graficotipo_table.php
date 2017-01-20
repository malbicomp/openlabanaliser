<?php

use yii\db\Migration;

/**
 * Handles the creation of table `graficotipo`.
 */
class m170119_161012_create_graficotipo_table extends Migration
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
        
        $this->createTable('graficotipo', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(50)->notNull(),
            'descricao' => $this->string(200)->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('graficotipo');
    }
}
