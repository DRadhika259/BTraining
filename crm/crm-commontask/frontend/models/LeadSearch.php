<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leads;


class LeadSearch extends Leads{

    public function rules(){
        return[
            [['lead_id'],'integer'],
            [['lead_name','created_at'],'safe'],

        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }

    public function search($params){
        // $this->load($params);
        $query = Leads::find();
        
        // $query->joinWith(['plans','leads']);
        // $query->andFilterWhere([
        //     'lead.lead_name'=>$this->lead_name,
        //     'plan.plan_name'=>$this->plan_name,
        // ]);
        $dataProvider = new ActiveDataProvider(['query' => $query,]);
       
        $this->load($params);
        if(!$this->validate())
        {
            return $dataProvider;   
        }
        $query->andFilterWhere([
            'lead_id' => $this->lead_id,
            'created_at' => $this->created_at,
        ]);
        $query->andFilterWhere(['like', 'lead_name', $this->lead_name]);
        return $dataProvider;      
}

}