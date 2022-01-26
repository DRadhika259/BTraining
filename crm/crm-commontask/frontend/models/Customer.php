<?php

namespace frontend\models;
use Yii;

class Customer extends \yii\db\ActiveRecord
{
    public static function tableName(){
        return 'customer';
    }

    public function rules()
    {
        return [
            [['lead_id', 'plan_id'], 'integer'],
            [['cust_name'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cust_id' => 'Customer ID',
            'cust_name' => 'Customer name',
            'lead_id' => 'Lead ID',
            'plan_id' => 'Plan ID',
        ];
    }

    public function getPlan() {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }

    public function getLeads() {
        return $this->hasOne(Leads::className(), ['lead_id' => 'lead_id']);
    }
}