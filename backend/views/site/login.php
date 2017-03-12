<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile('/');
?>
<style>
.form-control-feedback{
    
}
</style>
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Administrator</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Please fill out the following fields to login:</p>
        
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            
            <div class="form-group has-feedback">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">
                <?= $form->field($model, 'password')->passwordInput() ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <?= $form->field($model, 'rememberMe')->checkbox() ?>                          
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
