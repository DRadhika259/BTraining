<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leads;
use frontend\models\Customer;
use frontend\models\Plan;

class CustomerSearch extends Customer{
    public $lead_name;
    public $plan_name;

    public function rules(){
        return[
            [['cust_id','lead_id','plan_id'],'integer'],
            [['cust_name','plan_name','lead_name'],'safe'],

        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }

    public function search($params)
    {
        $this->load($params);
        $query = Customer::find();
        
        $query->joinWith(['plan','leads']);
        $query->andFilterWhere([
            'lead.lead_name'=>$this->lead_name,
            'plan.plan_name'=>$this->plan_name,
        ]);
        $dataProvider = new ActiveDataProvider(['query' => $query,]);

        $dataProvider->setSort([
            'attributes' => [
                'cust_id',
                'cust_name',
                'plan_name' => [
                    'asc' => ['plan_name' => SORT_ASC],
                    'desc' => ['plan_name' => SORT_DESC],
                    'label' => 'Plan Name',
                    'default' => SORT_ASC
                ],
                'lead_name' => [
                    'asc' => ['lead_name' => SORT_ASC],
                    'desc' => ['lead_name' => SORT_DESC],
                    'label' => 'Lead Name',
                    'default' => SORT_ASC
                ]],
                ]);
        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;   
        }
        $query->andFilterWhere([
            'cust_id' => $this->cust_id,
        ]);
        $query->andFilterWhere(['like', 'cust_name', $this->cust_name]);
        return $dataProvider;      
}

public function getLeads(){
    return $this->hasOne(Leads::className(),['lead_id' => 'lead_id']);
}

public function getPlan(){
    return $this->hasOne(Plan::className(),['plan_id' => 'plan_id']);
}
}
