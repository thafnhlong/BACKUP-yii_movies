<?php

use yii\helpers\Html;
use dmstr\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\StockOut */

$this->title = 'Tạo 1 đơn xuất kho';
$this->params['breadcrumbs'][] = ['label' => 'Stock Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-out-create">

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
