<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\Task;
use frontend\models\Admin;
use frontend\models\TaskSearch;


class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $task = new Task();
        if ($task->load(Yii::$app->request->post()) && $task->save()) {  
            return $this->redirect(['index']);
        }
        return $this->render('create',['task'=>$task]);
    }

    public function actionUpdate($id)
    {
        $task = Task::findOne($id);

        if($task->load(Yii::$app->request->post()) && $task->save()){
            return $this->redirect(['index','id'=>$task->task_id]);
        }
        return $this->render('update',['task'=>$task]);
    }

    public function actionDelete($id)
    {
      $task = Task::findOne($id)->delete();
      if ($task) {
        return $this->redirect(['index']);
      }
    }

    
}