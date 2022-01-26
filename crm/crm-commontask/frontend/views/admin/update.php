<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;

?>

<div class="admin-update">
<h2 class="page-header">Update Task</h2>
    <div class="body-content">
        <?php $form = ActiveForm::begin();?>
        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'task_name')?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'task_desc')?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'start_date')?>
        </div>
        </div>
        </div>
        <div class ="row">
        <div class = "form-group">
        <div class="col-lg-15">
            <?=$form->field($task,'emp_id')?>
        </div>
        </div>
        </div>

        <div class ="row">
        <div class = "form-group">
            <?=Html::submitButton('Submit',['class'=>'btn btn-success'])?>
            <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-secondary']) ?>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>