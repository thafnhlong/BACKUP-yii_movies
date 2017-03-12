<?php

use yii\helpers\Html;
use dmstr\widgets\Box;
use dmstr\widgets\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhập kho';
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'stock-in-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterSelector' => 'select[name="pageSize"]',
    'summary' =>  '<div class="pull-right">'.dmstr\widgets\PageSize::widget().'</div> Showing <strong>{begin}</strong> - <strong>{end}</strong> of <strong>{totalCount}</strong> items' ,
    'filterModel' => $searchModel,
    'columns' => [
        
        [
            'attribute' => 'create_date',
            'value' => function($model){
                return date('d/m/Y',strtotime($model->create_date));
            },
            'contentOptions' => ['style' => 'width:120px'],
            'format' => 'raw',
        ],
        [
            'attribute' => 'product_id',
            'value' => function($model){
                $product = Product::findOne(['id' => $model->product_id]);
                return $product->name;
            }
        ],
        [
            'attribute' => 'quantity',
            'contentOptions' => ['style' => 'text-align:right;width:100px'],
        ],
        [
            'attribute' => 'quantity_sold',
            'contentOptions' => ['style' => 'text-align:right;width:100px'],
        ],
        [
            'attribute' => 'price',
            'value' => function($model){
                return number_format($model->price,0,'.',',') . ' &#8363;';
            },
            'contentOptions' => ['style' => 'text-align:right;width:150px'],
            'format' => 'raw',
        ],
        [
            'attribute' => 'into_money',
            'value' => function($model){
                $into_money = $model->price*$model->quantity;
                return number_format($into_money,0,'.',',') . ' &#8363;';
            },
            'contentOptions' => ['style' => 'text-align:right;width:120px'],
            'format' => 'raw',
        ],
        [
            'attribute' => 'provider',
            'contentOptions' => ['style' => 'text-align:right;width:130px'],
        ],
        [
            'attribute' => 'payment',
            'value' => function($model){
                $list = $model->list_payments;
                return $list[$model->payment];
            },
            'filter' =>  Html::activeDropDownList($searchModel,'payment',$searchModel->list_payments,[
                'class' => 'form-control',
                'prompt' => '-- Tất cả --',
            ]),
            'contentOptions' => ['style' => 'text-align:right;width:150px'],
        ],
        [
            'attribute' => 'note',
            'contentOptions' => ['style' => 'text-align:right;width:200px'],
        ],
    ],
];

$showActions = true;
$actions[] = '{view} &nbsp; &nbsp; {update}&nbsp; &nbsp; {delete}';

if (Yii::$app->user->can('/stock-in/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/stock-in/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/stock-in/delete')) {
    $actions[] = '{delete}';
    $showActions = $showActions || true;
}

if ($showActions === true) {
    $gridConfig['columns'][] = [
        'class'    => ActionColumn::className(),
        'template' => implode(' ', $actions),
        'contentOptions' => [
            'align' => 'center',
            'width' => '100px'
        ]
    ];
}
?>

<div class="stock-in-index">

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
