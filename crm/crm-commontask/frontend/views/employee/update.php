<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;


?>

<div class="employee-update">
<h2 class="page-header">Update Employee</h2>  
    <div class="body-content">
        <?php $form = ActiveForm::begin();?>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($adminemployee, 'emp_name')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($adminemployee, 'emp_email')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($adminemployee, 'emp_phone')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($adminemployee, 'emp_pass')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($adminemployee, 'created_at')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        
        <div class ="row">
        <div class="form-group">
            <?=Html::submitButton('Update',['class'=>'btn btn-success'])?>
            <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-secondary']) ?>
            
        </div>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>



