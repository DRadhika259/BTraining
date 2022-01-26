<?php

use yii\helpers\Html;   
use yii\widgets\LinkPager;
use yii\grid\GridView;


$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label'=>'Customers','url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form', [
        'model' => $model,
    ]) ?>

</div>
