<?php

namespace frontend\models;
use frontend\models\AdminEmployee;
use Yii;


class Task extends \yii\db\ActiveRecord
{
    public static function tableName(){
        return 'task';
    }

    public function rules(){
        return [
            [['task_name', 'task_desc'], 'required'],
            [['start_date'],'safe'],
            [['emp_id','task_id'],'integer'],
            [['task_name','task_desc','emp_id'],'string','max'=>255],
        ];
    }

    public function attributeLabels(){
        return[
            'task_id' =>'Task ID',
            'task_name' =>'Task Name',
            'task_desc'=> 'Task Description',
            'start_date'=>'Start Date',
            'emp_id'=> 'Employee Name',
        ];
    }
    public function getAdminEmployee() {
        return $this->hasOne(AdminEmployee::className(), ['emp_id' => 'emp_id']);
    }
}