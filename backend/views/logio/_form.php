<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LogIo */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="log-io-form">

    <?php $form = ActiveForm::begin([
        'id' => 'log-io-form',
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'stock_in_quantity')->textInput() ?>

    <?= $form->field($model, 'stock_out_quantity')->textInput() ?>

    <?= $form->field($model, 'opening_stock')->textInput() ?>

    <?= $form->field($model, 'closing_stock')->textInput() ?>

    <?= $form->field($model, 'total_input_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_output_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'monthly')->textInput(['maxlength' => true]) ?>


    <div class="col-sm-6 col-sm-offset-3">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
        <?php if ($model->isNewRecord): ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-warning']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
