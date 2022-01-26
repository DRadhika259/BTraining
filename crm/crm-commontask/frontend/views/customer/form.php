<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\grid\GridView;
// use yii\widgets\LinkPager;

?>

<div class="customer-form"> 
    <div class="body-content">
        <?php $form = ActiveForm::begin();?>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
        <?= $form->field($model, 'cust_name')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
        <?= $form->field($model, 'lead_id')->textInput() ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
        <?= $form->field($model, 'plan_id')->textInput() ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class="form-group">
            <?=Html::submitButton('Save',['class'=>'btn btn-success'])?>
            <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-secondary']) ?>
        </div>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>