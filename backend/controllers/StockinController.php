<?php

namespace backend\controllers;

use Yii;
use common\models\StockIn;
use backend\models\StockInSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;

/**
 * StockinController implements the CRUD actions for StockIn model.
 */
class StockinController extends Controller
{
    public $layout = '/admin-lte/main';
    public function behaviors()
    {
        $access_rule = new AccessRule;
        $rules = $access_rule->behaviors($this->id);
        return $rules;
    }
    /**
     * Lists all StockIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $pageSize = Yii::$app->getRequest()->getQueryParam('pageSize',20);
        $pageSize = intval($pageSize);
        $searchModel = new StockInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=$pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockIn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StockIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StockIn();
        $model->create_date = date('Y-m-d');
        $model->quantity = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $sql = "UPDATE product SET quantity = quantity +".$model->quantity." WHERE id =".$model->product_id;
            Yii::$app->db->createCommand($sql)->execute();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Entry has been saved successfully!'));
            
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StockIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Entry has been saved successfully!'));

            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StockIn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Entry has been deleted successfully!'));

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StockIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StockIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockIn::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
