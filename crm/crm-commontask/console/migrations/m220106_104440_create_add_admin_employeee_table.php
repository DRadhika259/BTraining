<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_admin_employeee}}`.
 */
class m220106_104440_create_add_admin_employeee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin_employee', [
            'emp_id' => $this->primaryKey(),
            'emp_name' => $this->string()->notNull(),
            'emp_email' => $this->string()->notNull(),
            'emp_phone' => $this->string()->notNull(),
            'emp_pass' => $this->string()->notNull(),
            'created_at' => $this->date()->notNull(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin_employee');
    }
}
