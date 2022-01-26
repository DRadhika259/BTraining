<?php   
  
use yii\helpers\Html;   
use yii\widgets\DetailView;   
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;

   
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];   
$this->params['breadcrumbs'][] = $this->title;  
\yii\web\YiiAsset::register($this);
?>   
<div class="customer-view">   
  
    <h1><?= Html::encode($this->title) ?></h1>   

    <?= DetailView::widget([   
        'model' => $model,   
        'attributes' => [   
            'cust_id',   
            'cust_name',     
            'lead_id',   
            'plan_id',   
        ],   
    ]) ?>   
  
 
  
        </div>  
</div>   
