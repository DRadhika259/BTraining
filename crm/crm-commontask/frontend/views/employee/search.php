<?php   
  
use yii\helpers\Html;   
use yii\widgets\ActiveForm;   
  
?>   
  
<div class="employee-search">   
  
    <?php $form = ActiveForm::begin([   
        'action' => ['index'],   
       'method' => 'get',   
    ]); ?>   
  
    <?= $form->field($model, 'emp_id') ?>   
  
    <?= $form->field($model, 'emp_name') ?>   
  
    <?= $form->field($model, 'emp_email') ?>   
  
    <?= $form->field($model, 'emp_phno') ?> 

    <?= $form->field($model, 'created_at') ?>   

    <div class="form-group">   
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>   
       <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>   
    </div>   
  
    <?php ActiveForm::end(); ?>   
  
</div> 