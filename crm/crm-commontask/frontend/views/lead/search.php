<?php   
  
use yii\helpers\Html;   
use yii\widgets\ActiveForm;   
  
?>   
  
<div class="leads-search">   
  
    <?php $form = ActiveForm::begin([   
        'action' => ['index'],   
       'method' => 'get',   
    ]); ?>   
  
    <?= $form->field($model, 'lead_id') ?>   
  
    <?= $form->field($model, 'lead_name') ?>   
  
    <?= $form->field($model, 'created_at') ?>    
  
    <div class="form-group">   
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>   
       <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>   
    </div>   
  
    <?php ActiveForm::end(); ?>   
  
</div>   