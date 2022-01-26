<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AdminEmployee;

class EmployeeSearch extends AdminEmployee
{
    public function rules(){
        return[
           [['emp_id'],'integer'],
           [['emp_name','emp_email','emp_phone','emp_pass','created_at'],'safe'], 
        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }

    public function search($params)
    {
        $query=AdminEmployee::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);

        $this->load($params);
        if(!$this->validate())
        {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'emp_id'=>$this->emp_id,
            'emp_email'=>$this->emp_email,
            'emp_phone'=>$this->emp_phone,
            'created_at'=>$this->created_at,

        ]);
        $query->andFilterWhere(['like','emp_name',$this->emp_name]);
        return $dataProvider;
    }
}