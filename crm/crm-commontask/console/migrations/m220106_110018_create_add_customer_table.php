<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_customer}}`.
 */
class m220106_110018_create_add_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'cust_id' => $this->primaryKey(),
            'cust_name' => $this->string()->notNull(),
            'lead_id' => $this->integer()->notNull(),
            'plan_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-plan-plan_id',
            'customer',
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
        $this->dropTable('customer');
        $this->dropForeignKey(
            'fk-plan-plan_id',
            'plan'
        );


    }
}
