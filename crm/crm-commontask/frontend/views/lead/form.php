<?php   
  
use yii\helpers\Html;   
use yii\widgets\ActiveForm;  
use frontend\models\Plan;
use frontend\models\Lead; 
?>   
  
<div class="leads-form">   
<?php $form = ActiveForm::begin(); ?>   
<div class ="row">
<div class = "form-group">
    <?= $form->field($model, 'lead_name')->textInput(['maxlength' => true]) ?> 
</div>
</div>

<div class ="row">
<div class = "form-group">
<?= $form->field($model, 'plan_id')->dropDownList(
                                            Plan::find()
                                            ->select(['plan_name','plan_id'])
                                            ->indexBy('plan_id')
                                            ->column(),['prompt' => '-- Select Plan --']
                                            ); ?>

</div>
</div>
<div class ="row">
<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-secondary']) ?>

    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>