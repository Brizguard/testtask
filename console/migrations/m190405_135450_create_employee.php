<?php

use yii\db\Migration;

/**
 * Class m190405_135450_create_employee
 */
class m190405_135450_create_employee extends Migration
{
    public function up()    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'phone' => $this->string(),
            'position' => $this->string(),
            'active' => $this->smallInteger()->notNull()->defaultValue(0),
            'salary' => $this->float()->defaultValue(0)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%employee}}');
    }
}
