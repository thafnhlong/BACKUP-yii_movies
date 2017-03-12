<?php

use yii\helpers\Html;
use dmstr\widgets\Box;
use dmstr\widgets\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mặt hàng';
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'product-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterSelector' => 'select[name="pageSize"]',
    'summary' =>  '<div class="pull-right">'.dmstr\widgets\PageSize::widget().'</div> Showing <strong>{begin}</strong> - <strong>{end}</strong> of <strong>{totalCount}</strong> items' ,
    'filterModel' => $searchModel,
    'columns' => [
        [
             'attribute' => 'id',
             'contentOptions' => ['style' => 'width:70px'],
        ],
        'name',
        'code',
        'create_date',
        'quantity',
    ],
];

$showActions = true;
$actions[] = '{view} &nbsp; &nbsp; {update}&nbsp;';

if (Yii::$app->user->can('/product/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/product/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/product/delete')) {
    $actions[] = '{delete}';
    $showActions = $showActions || true;
}

if ($showActions === true) {
    $gridConfig['columns'][] = [
        'class'    => ActionColumn::className(),
        'template' => implode(' ', $actions),
        'contentOptions' => [
            'style' => 'min-width:120px;text-align:center'
        ]
    ];
}
?>

<div class="product-index">

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php Box::begin(
                [
                    'bodyOptions' => [
                        'class' => 'table-responsive'
                    ],
                    'grid' => $gridId
                ]
            ); ?>
            <?= GridView::widget($gridConfig); ?>
            <?php Box::end(); ?>
        </div>
    </div>

<?php Pjax::end(); ?>
</div>
