<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dmstr\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\LogIo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Ios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-io-view">

    <p>
        <?= Html::a('Back to list', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                                'id',
                    'product_id',
                    'stock_in_quantity',
                    'stock_out_quantity',
                    'opening_stock',
                    'closing_stock',
                    'total_input_money',
                    'total_output_money',
                    'last_update',
                    'note:ntext',
                    'monthly',
                ],
            ]) ?>
            <?php Box::end(); ?>
        </div>
    </div>

</div>
