<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_plan}}`.
 */
class m220106_105915_create_add_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plan',[
            'plan_id' => $this->primaryKey(),
            'plan_name' => $this->string(255)->notNull(),
            'validity' => $this->string(255)->notNull(),
            'plan_data' => $this->string(255)->notNull() ,
            'price' => $this->string(255)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('plan');
    }
}
