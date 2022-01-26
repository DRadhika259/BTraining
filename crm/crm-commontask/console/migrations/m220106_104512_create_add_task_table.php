<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_task}}`.
 */
class m220106_104512_create_add_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      
        $this->createTable('task', [
            'task_id' => $this->primaryKey(),
            'task_name' => $this->string()->notNull(),
            'task_desc' => $this->string()->notNull(),
            'start_date' => $this->date()->notNull(),
            'emp_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-admin_employee-emp_id',
            'task',
            'emp_id',
            'admin_employee',
            'emp_id',
            
          
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-admin_employee-emp_id',
            'admin_employee'
        );


    }
}
