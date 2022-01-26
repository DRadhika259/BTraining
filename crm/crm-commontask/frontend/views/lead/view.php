<?php   
  
use yii\helpers\Html;   
use yii\widgets\DetailView;   
    
  
$this->title = $model->lead_id;   
$this->params['breadcrumbs'][] = ['label' => 'Leads', 'url' => ['index']];   
$this->params['breadcrumbs'][] = $this->title; 
\yii\web\YiiAsset::register($this);  
?>   
<div class="leads-view">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
    <p>   
       <?= Html::a('Update', ['update', 'lead_id' => $model->lead_id], ['class' => 'btn btn-success']) ?>   
        <?= Html::a('Delete', ['delete', 'lead_id' => $model->lead_id], [   
            'class' => 'btn btn-danger',   
            'data' => [   
                'confirm' => 'You are about to delete this item, are you sure?',   
                'method' => 'post',   
            ],   
        ]) ?>   
    </p>   
  
    <?= DetailView::widget([   
        'model' => $model,   
        'attributes' => [   
            'lead_id',   
            'lead_name',   
            'created_at',   
        ],   
    ]) ?>   
  
</div>