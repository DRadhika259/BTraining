<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_lead}}`.
 */
class m220106_110403_create_add_lead_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('leads',[
            'lead_id' => $this->primaryKey(),
            'lead_name' => $this->string(255)->notNull(),
            'created_at' => $this->date()->notNull(),
            'plan_id' => $this->integer()->notNull(),
        ]);


        $this->addForeignKey(
            'fk-leads-plan_id',
            'leads',
            'plan_id',
            'plan',
            'plan_id',
           
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('leads');
        $this->dropForeignKey(
            'fk-plan-plan_id',
            'plan'
        );


    }
}
