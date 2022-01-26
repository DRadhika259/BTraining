<?php

namespace frontend\models;
use Yii;

class Plan extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return 'plan';
    }

    public function rules()
    {
        return [
            [['plan_id'], 'integer'],
            [['plan_name', 'validity', 'plan_data'], 'string', 'max' => 30],
            [['price'], 'string', 'max' => 20],
        ];
    }
    

    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_name' => 'Plan Name',
            'validity' => 'Validity',
            'plan_data' => 'Plan Data',
            'price' => 'Price',
        ];
    }

}