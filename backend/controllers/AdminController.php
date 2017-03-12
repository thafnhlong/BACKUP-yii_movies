<?php

namespace backend\controllers;

use Yii;
use common\models\Admin;
use backend\models\AdminSearch;
use backend\models\AdminGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    public $layout = '/admin-lte/main';
    public function behaviors()
    {
        $access_rule = new AccessRule;
        $rules = $access_rule->behaviors($this->id);
        return $rules;
    }
    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $pageSize = Yii::$app->getRequest()->getQueryParam('pageSize',20);
        $pageSize = intval($pageSize);
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=$pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Entry has been saved successfully!'));
            
            $post = Yii::$app->request->post();
            $model->admin = $post['Admin']['admin'];
            $model->setPassword($post['Admin']['password_hash']);
            $model->generateAuthKey();
            //dd($model->password_hash);
            if($model->save()){
                $groups = $post['Admin']['group'];
                if(count($groups) > 0){
                    foreach($groups as $value){
                        $adgr = new AdminGroup;
                        $adgr->admin_id = $model->id;
                        $adgr->group_id = $value;
                        $adgr->save();
                    }
                    
                }
    
                return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing Admin model.
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
            $post = Yii::$app->request->post();
            $groups = $post['Admin']['group'];
            if(count($groups) > 0){
                AdminGroup::deleteAll("admin_id = ".$model->id);
                foreach($groups as $value){
                    $adgr = new AdminGroup;
                    $adgr->admin_id = $model->id;
                    $adgr->group_id = $value;
                    $adgr->save();
                }
                
            }
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
     * Deletes an existing Admin model.
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
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
