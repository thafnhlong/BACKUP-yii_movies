<?php

use yii\helpers\Html;
use dmstr\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\StockIn */

$this->title = 'Update Stock In: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-in-update">

    <p>
        <?= Html::a('Back to list', ['index'], ['class' => 'btn btn-info']) ?>
    </p>

    <div class="row">
        <div class="col-xs-12">
            <?php Box::begin(
                [
                    'options'     => ['class' => 'box-success'],
                    'bodyOptions' => [
                        'class' => 'table-responsive'
                    ],
                ]
            ); ?>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            <?php Box::end(); ?>
        </div>
    </div>

</div>
