<?php

use yii\helpers\Html;
use dmstr\widgets\Box;
use dmstr\widgets\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'admin-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterSelector' => 'select[name="pageSize"]',
    'summary' =>  '<div class="pull-right">'.dmstr\widgets\PageSize::widget().'</div> Showing <strong>{begin}</strong> - <strong>{end}</strong> of <strong>{totalCount}</strong> items' ,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'admin',
        'auth_key',
        //'password_hash',
        //'password_reset_token',
        'email:email',
        'status',
        'created_at',
        'updated_at',
    ],
];

$showActions = true;
$actions[] = '{view} &nbsp; &nbsp; {update}&nbsp; &nbsp; {delete}';

if (Yii::$app->user->can('/admin/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/admin/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/admin/delete')) {
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

<div class="admin-index">

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


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


</div>
