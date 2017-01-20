<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dump`.
 */
class m170119_154305_create_dump_table extends Migration
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

        $this->createTable('dump', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'descricao' => $this->string(200)->notNull(),
            'qteCampos' => $this->smallInteger()->notNull()->defaulValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dump');
    }
}
