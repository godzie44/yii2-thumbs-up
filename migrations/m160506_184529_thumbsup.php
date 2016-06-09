<?php

use yii\db\Migration;

class m160506_184529_thumbsup extends Migration
{


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%thumbsup}}', [
            'id' => $this->primaryKey(),
            'entity' => $this->string(),
            'value' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx_entity', '{{%thumbsup}}', ['entity']);
        $this->createIndex('idx_created_by', '{{%thumbsup}}', ['created_by']);
        $this->createIndex('idx_created_at', '{{%thumbsup}}', ['created_at']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%thumbsup}}');
    }

}
