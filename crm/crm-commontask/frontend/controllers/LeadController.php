<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use frontend\models\Leads;
use frontend\models\LeadSearch;
use frontend\models\Customer;

class LeadController extends Controller
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
        
        $searchModel = new LeadSearch();   
        $dataProvider = $searchModel->search($this->request->queryParams);   
  
        return $this->render('index', [   
            'searchModel' => $searchModel,   
            'dataProvider' => $dataProvider,   
        ]);   
    }

    public function actionCreate()
    {
        $model = new Leads();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'lead_id' => $model->lead_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($lead_id),
        ]);
    }

    public function actionUpdate()
    {
        $model  = Leads::findOne($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()){
            return $this->redirect(['index','lead_id'=>$model ->lead_id]);
        }
        return $this->render('update',['model'=>$model]);
    }

    public function actionDelete()
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

 
    public function actionLink($id){
      
   
         $customer = new Customer();
         if ($customer->load($this->request->post()))
         {
           $customer->save();
           return $this->redirect(['index','cust_id'=>$customer->cust_id]);
         }
         return $this->render('link',['cust'=>$customer]);
       }
   
       protected function findModel($id)
       {
           if (($model = Leads::findOne($id)) !== null) {
               return $model;
           }
   
           throw new NotFoundHttpException('The requested page does not exist.');
       }

}
