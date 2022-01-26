<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\LinkPager;

?>

<div class="task-search">
    <div class="body-content">
        <?php $form = ActiveForm::begin([
            'action'=>['index'],
            'method'=>'get',
        ]);?>

        
        <div class = "form-group">
            <?=$form->field($model,'task_id')?>
        </div>
        <div class = "form-group">
            <?=$form->field($model,'task_name')?>
        </div>

        <div class = "form-group">
            <?=$form->field($model,'task_desc')?>
        </div>

        <div class = "form-group">
            <?=$form->field($model,'start_date')?>
        </div>


        <div class="form-group">
            <?=Html::submitButton('Find',['class'=>'btn btn-success'])?>
            <?= Html::resetButton('Reset', ['index'], ['class'=>'btn btn-secondary']) ?>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>