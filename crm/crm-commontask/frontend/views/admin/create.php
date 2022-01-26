<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use frontend\models\AdminEmployee;

?>

<div class="admin-create">
<h2 class="page-header">Insert New Task</h2>  
    <div class="body-content">
        <?php $form = ActiveForm::begin();?>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'task_name')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'task_desc')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'start_date')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'emp_id')->textInput(['maxlength' => true]) ->dropDownList(
                AdminEMployee::find()->select(['emp_name','emp_id'])
                                    ->indexBy('emp_id')
                                    ->column(),['prompt'=>'-- Select Employee --']);
            ?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class="form-group">
            <?=Html::submitButton('Submit',['class'=>'btn btn-success'])?>
            <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-secondary']) ?>
            
        </div>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>