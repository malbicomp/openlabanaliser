<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mapeamentopseudocampo`.
 * Has foreign keys to the tables:
 *
 * - `indicador_and_campodump`
 * - `pseudocampo`
 */
class m170119_170355_create_junction_table_for_indicador_and_campodump_and_pseudocampo_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mapeamentopseudocampo', [
            'id' => $this->integer(),
            'idindicador' => $this->integer(),
            'idcampodump' => $this->integer(),
            'idpseudocampo' => $this->integer(),
        ]);

        //Criação de Index para idindicador
        $this->createIndex(
            'idx-mapeamentopseudocampo-idindicador',
            'mapeamentopseudocampo',
            'idindicador'
        );

        $this->addForeignKey(
            'fk-mapeamentopseudocampo-idindicador',
            'mapeamentopseudocampo',
            'idindicador',
            'indicador',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-mapeamentopseudocampo-idcampodump',
            'mapeamentopseudocampo',
            'idcampodump'
        );

        $this->addForeignKey(
            'fk-mapeamentopseudocampo-idcampodump',
            'mapeamentopseudocampo',
            'idcampodump',
            'campodump',
            'id',
            'RESTRICT'
        );

        // creates index for column `pseudocampo_id`
        $this->createIndex(
            'idx-mapeamentopseudocampo-idpseudocampo',
            'mapeamentopseudocampo',
            'idpseudocampo'
        );

        // add foreign key for table `pseudocampo`
        $this->addForeignKey(
            'fk-mapeamentopseudocampo-idpseudocampo',
            'mapeamentopseudocampo',
            'idpseudocampo',
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
            'fk-mapeamentopseudocampo-idindicador',
            'mapeamentopseudocampo'
        );

        $this->dropIndex(
            'idx-mapeamentopseudocampo-idindicador',
            'mapeamentopseudocampo'
        );

        $this->dropForeignKey(
            'fk-mapeamentopseudocampo-idcampodump',
            'mapeamentopseudocampo'
        );

        $this->dropIndex(
            'idx-mapeamentopseudocampo-idcampodump',
            'mapeamentopseudocampo'
        );

        $this->dropForeignKey(
            'fk-mapeamentopseudocampo-idpseudocampo',
            'mapeamentopseudocampo'
        );

        $this->dropIndex(
            'idx-mapeamentopseudocampo-idpseudocampo',
            'mapeamentopseudocampo'
        );

        $this->dropTable('mapeamentopseudocampo');
    }
}
