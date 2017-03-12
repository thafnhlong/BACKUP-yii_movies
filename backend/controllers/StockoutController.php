<?php

namespace backend\controllers;

use Yii;
use common\models\StockOut;
use backend\models\StockOutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\Product;

/**
 * StockoutController implements the CRUD actions for StockOut model.
 */
class StockoutController extends Controller
{
    public $layout = '/admin-lte/main';
    public function behaviors()
    {
        $access_rule = new AccessRule;
        $rules = $access_rule->behaviors($this->id);
        return $rules;
    }
    /**
     * Lists all StockOut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $pageSize = Yii::$app->getRequest()->getQueryParam('pageSize',20);
        $pageSize = intval($pageSize);
        $searchModel = new StockOutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=$pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockOut model.
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
     * Creates a new StockOut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StockOut();
        $model->create_date = date('Y-m-d');
        $model->quantity = 1;
        $product_id = isset($_POST['StockOut']['product_id']) ? $_POST['StockOut']['product_id'] : null;
        
        if ($model->load(Yii::$app->request->post()))
        {
            
            if(!is_null($product_id)){
                $product = Product::findOne(['id' => $product_id]);
                $max_quantity = $product->quantity;
                if($model->quantity <= $max_quantity){
                    if($model->save()){
                        $model->log($model->id);
                        $sql = "UPDATE product SET quantity = quantity -".$model->quantity." WHERE id =".$model->product_id;
                        Yii::$app->db->createCommand($sql)->execute();
                        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Entry has been saved successfully!'));
            
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }else{
                    Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Số lượng bán ra vượt quá số lượng trong kho ('.$max_quantity.')'));
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StockOut model.
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
     * Deletes an existing StockOut model.
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
     * Finds the StockOut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StockOut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockOut::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
