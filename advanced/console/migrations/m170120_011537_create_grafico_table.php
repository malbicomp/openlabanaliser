<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'grafico'.
 */
class m170120_011537_create_grafico_table extends Migration
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

        $this->createTable('grafico', [
            'id' => $this->primaryKey(),
            'idindicador' => $this->integer()->notNull(),
            'idtipografico' => $this->integer()->notNull(),
            'multiplot' => $this->char(1)->notNull(),
            'pseudocampoidentidade' => $this->integer()->notNull(),
            'x' => $this->integer()->notNull(),
            'y' => $this->integer()->notNull(),
            'z' => $this->integer(),
        ], $tableOptions);

        //Chave Estrangeira idindicador
        $this->createIndex(
            'idx-grafico-idindicador',
            'grafico',
            'idindicador'
        );

        $this->addForeignKey(
            'fk-grafico-idindicador',
            'grafico',
            'idindicador',
            'indicador',
            'id',
            'RESTRICT'
        );

        //Chave Estrangeira idtipografico
        $this->createIndex(
            'idx-grafico-idtipografico',
            'grafico',
            'idtipografico'
        );

        $this->addForeignKey(
            'fk-grafico-idtipografico',
            'grafico',
            'idtipografico',
            'graficotipo',
            'id',
            'RESTRICT'
        );

        //Chave Estrangeira pseudocampoidentidade
        $this->createIndex(
            'idx-grafico-pseudocampoidentidade',
            'grafico',
            'pseudocampoidentidade'
        );

        $this->addForeignKey(
            'fk-grafico-pseudocampoidentidade',
            'grafico',
            'pseudocampoidentidade',
            'pseudocampo',
            'id',
            'RESTRICT'
        );

        //Chave Estrangeira x
        $this->createIndex(
            'idx-grafico-x',
            'grafico',
            'x'
        );

        $this->addForeignKey(
            'fk-grafico-x',
            'grafico',
            'x',
            'pseudocampo',
            'id',
            'RESTRICT'
        );

        //Chave Estrangeira y
        $this->createIndex(
            'idx-grafico-y',
            'grafico',
            'x'
        );

        $this->addForeignKey(
            'fk-grafico-y',
            'grafico',
            'y',
            'pseudocampo',
            'id',
            'RESTRICT'
        );

        //Chave Estrangeira z
        $this->createIndex(
            'idx-grafico-z',
            'grafico',
            'z'
        );

        $this->addForeignKey(
            'fk-grafico-z',
            'grafico',
            'z',
            'pseudocampo',
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
            'fk-grafico-idindicador',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-idindicador',
            'grafico'
        );

        $this->dropForeignKey(
            'fk-grafico-idtipografico',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-idtipografico',
            'grafico'
        );

        $this->dropForeignKey(
            'fk-grafico-pseudocampoidentidade',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-pseudocampoidentidade',
            'grafico'
        );

        $this->dropForeignKey(
            'fk-grafico-x',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-x',
            'grafico'
        );        

        $this->dropForeignKey(
            'fk-grafico-y',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-y',
            'grafico'
        );

        $this->dropForeignKey(
            'fk-grafico-z',
            'grafico'
        );

        $this->dropIndex(
            'idx-grafico-z',
            'grafico'
        );

        $this->dropTable('grafico');
    }
}
