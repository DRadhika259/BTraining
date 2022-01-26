<?php

namespace frontend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\AdminEmployee;
use frontend\models\EmployeeSearch;

class EmployeeController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $searchModel = new EmployeeSearch();
       $dataProvider = $searchModel->search($this->request->queryParams);
        
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $adminemployee = new AdminEmployee();
        if($adminemployee->load(Yii::$app->request->post())&& $adminemployee->save()){
            return $this->redirect(['index']);
        }
        return $this->render('create',['adminemployee'=>$adminemployee]);
    }

    public function actionUpdate($id)
    {
        $adminemployee = AdminEmployee::findOne($id);
       
        if($adminemployee->load(Yii::$app->request->post())&& $adminemployee->save()){
            return $this->redirect(['index','id'=>$adminemployee->emp_id]);
        }
        return $this->render('update',['adminemployee'=>$adminemployee]);
    }

    public function actionDelete($id)
    {
        $adminemployee = AdminEmployee::findOne($id)->delete();
        if($adminemployee){
            return $this->redirect(['index']);
        }
        return $this->render('delete');
    }
}

    

    


