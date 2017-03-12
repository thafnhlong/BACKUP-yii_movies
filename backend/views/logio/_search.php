<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LogIoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-io-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'stock_in_quantity') ?>

    <?= $form->field($model, 'stock_out_quantity') ?>

    <?= $form->field($model, 'opening_stock') ?>

    <?php // echo $form->field($model, 'closing_stock') ?>

    <?php // echo $form->field($model, 'total_input_money') ?>

    <?php // echo $form->field($model, 'total_output_money') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'monthly') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
