<?php   
  
use yii\helpers\Html;   
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;


$this->title = 'Update Leads' . $model->lead_id;   
$this->params['breadcrumbs'][] = ['label' => 'Leads', 'url' => ['index']];   
$this->params['breadcrumbs'][] = ['label' => $model->lead_id, 'url' => ['view', 'lead_id' => $model->lead_id]];   
$this->params['breadcrumbs'][] = 'Update';   
?>   
<div class="leads-update">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
    <?= $this->render('form', [   
        '$model,' => $model,,   
    ]) ?>   
  
</div>   