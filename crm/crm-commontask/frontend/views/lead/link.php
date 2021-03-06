<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Plan;

?>
<div class="lead-link">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($cust, 'cust_name') ?>
        <?= $form->field($cust, 'lead_id')->textInput(['value'=> $_GET['id']]) ?>
        <?= $form->field($cust, 'plan_id')->dropDownList(
                                            Plan::find()
                                            ->select(['plan_name','plan_id'])
                                            ->indexBy('plan_id')
                                            ->column(),['prompt' => '--Select Plan--']
                                            ); ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>