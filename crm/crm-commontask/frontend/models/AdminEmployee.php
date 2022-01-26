<?php

namespace frontend\models;

use Yii;

class AdminEmployee extends \yii\db\ActiveRecord{
    public static function tableName(){
        return 'admin_employee';
    }

    public function rules(){
        return [
            [['emp_name','emp_email','emp_phone','emp_pass'],'required'],
            [['emp_phone'],'integer'],
            [['created_at'],'safe'],
            [['emp_name','emp_email','emp_pass'],'string'],
        ];
    }

    public function attributeLabels(){
        return [
            'emp_id' => 'Employee ID',
            'emp_name' =>'Employee Name',
            'emp_email'=>'Employee Email',
            'emp_phone'=>'Employee Phone',
            'emp_pass'=>'Employee Password',
            'created_at'=>'Created At',
        ];
    }

    
}