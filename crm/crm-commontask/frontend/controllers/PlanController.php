<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\LeadSearch;
use frontend\models\Plan;

class PlanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Plan::find();
        $dataProvider = new ActiveDataProvider([
          'query' => $query,
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider
          ]);
          
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    // public function actionUpdate()
    // {
    //     return $this->render('update');
    // }

    public function actionDelete()
    {
        return $this->render('delete');
    }
    
}
