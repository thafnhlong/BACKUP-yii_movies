<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'id' => 'category-form',
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>


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
