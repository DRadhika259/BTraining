<?php   
  
use yii\helpers\Html;   
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;


// $this->title = 'Update Customer ' . $model->cust_id;
$this->title = 'Update Customer ';   
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];   
$this->params['breadcrumbs'][] = ['label' => $model->cust_id, 'url' => ['view', 'cust_id' => $model->cust_id]];   
$this->params['breadcrumbs'][] = 'Update';   
?>   
<div class="customer-update">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
    <?= $this->render('form', [   
        'model' => $model,   
    ]) ?>   
  
</div>   