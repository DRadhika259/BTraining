<?php   
  
namespace frontend\models;   
  
use Yii;   
use yii\base\Model;   
use yii\data\ActiveDataProvider;   
use frontend\models\Admin;   
use frontend\models\AdminEmployee;   
use frontend\models\Task;

class TaskSearch extends Task
{
    public $emp_name;
    public function rules()
    {
        return[
            [['task_id','emp_id'],'integer'],
            [['task_name','task_desc','start_date','emp_name'],'safe'],

        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }

    public function search($params)
    {
        $this->load($params);
        $query = Task::find();
        
        $query->joinWith(['adminEmployee']);
        $query->andFilterWhere([
            'admin_employee.emp_name'=>$this->emp_name,
        ]);
        $dataProvider = new ActiveDataProvider(['query' => $query,]);
       
        $dataProvider->setSort([
            'attributes' => [
                'task_id',
                'task_name',
                'task_desc',
                'start_date',
                'emp_name' => [
                    'asc' => ['emp_name' => SORT_ASC],
                    'desc' => ['emp_name' => SORT_DESC],
                    'label' => 'Employee Name',
                    'default' => SORT_ASC
                ]],
        ]);

        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;   
        }
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'start_date'=>$this->start_date,
        ]);
        $query->andFilterWhere(['like', 'task_name', $this->task_name]);
        return $dataProvider;      
}

public function getAdminEmployee() {
    return $this->hasOne(AdminEmployee::className(), ['emp_id' => 'emp_id']);
}
}