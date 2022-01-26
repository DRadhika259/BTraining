<?php

namespace frontend\controllers;

use Yii; 
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\Customer;
use frontend\models\CustomerSearch;
use yii\web\NotFoundHttpException;
use app\models\lead;



class CustomerController extends Controller
{
    
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
          
    }   
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();   
        $dataProvider = $searchModel->search($this->request->queryParams);   
  
        return $this->render('index', [   
            'searchModel' => $searchModel,   
            'dataProvider' => $dataProvider,   
        ]);   
    }

    public function actionCreate()
    {
        $model = new Customer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cust_id' => $model->cust_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($cust_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cust_id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()){
            return $this->redirect(['index','cust_id'=>$model->cust_id]);
        }
        return $this->render('update',['model'=>$model,]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
