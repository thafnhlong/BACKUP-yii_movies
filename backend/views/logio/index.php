<?php

use yii\helpers\Html;
use dmstr\widgets\Box;
use dmstr\widgets\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogIoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tổng hợp xuất - nhập - tồn';
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'log-io-grid';
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
        [
            'attribute' => 'product_id',
            'value' => function($model){
                $product = Product::findOne(['id' => $model->product_id]);
                return $product->name;
            }
        ],
        [
            'attribute' => 'opening_stock',
            'contentOptions' => ['style' => 'text-align:right;width:120px'],
        ],
        [
            'attribute' => 'stock_in_quantity',
            'contentOptions' => ['style' => 'text-align:right;width:100px'],
        ],
        [
            'attribute' => 'stock_out_quantity',
            'contentOptions' => ['style' => 'text-align:right;width:100px'],
        ],
        [
            'attribute' => 'closing_stock',
            'contentOptions' => ['style' => 'text-align:right;width:120px'],
        ],
        [
            'attribute' => 'total_input_money',
            'value' => function($model){
                return number_format($model->total_input_money,0,'.',',') . ' &#8363;';
            },
            'format' => 'raw',
            'contentOptions' => ['style' => 'text-align:right;width:120px'],
        ],
        [
            'attribute' => 'total_output_money',
            'value' => function($model){
                return number_format($model->total_output_money,0,'.',',') . ' &#8363;';
            },
            'format' => 'raw',
            'contentOptions' => ['style' => 'text-align:right;width:140px'],
        ],
        [
            'attribute' => 'profit',
            'value' => function($model){
                return number_format($model->total_output_money - $model->total_input_money,0,'.',',') . ' &#8363;';
            },
            'format' => 'raw',
            'contentOptions' => ['style' => 'text-align:right;width:140px'],
        ],
        [
            'attribute' => 'last_update',
            'value' => function($model){
                return date('d/m/Y - H:i',strtotime($model->last_update));
            },
            'contentOptions' => ['style' => 'text-align:right;width:130px'],
        ],
        // 'closing_stock',
        // 'total_input_money',
        // 'total_output_money',
        // 'last_update',
        // 'note:ntext',
        // 'monthly',
    ],
];

$showActions = true;
$actions[] = '{view} &nbsp; &nbsp; {update}';

if (Yii::$app->user->can('/log-io/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/log-io/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/log-io/delete')) {
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

<div class="log-io-index">

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
