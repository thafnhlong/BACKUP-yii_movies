<?php

use yii\helpers\Html;
use dmstr\widgets\Box;
use dmstr\widgets\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'groups-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterSelector' => 'select[name="pageSize"]',
    'summary' =>  '<div class="pull-right">'.dmstr\widgets\PageSize::widget().'</div> Showing <strong>{begin}</strong> - <strong>{end}</strong> of <strong>{totalCount}</strong> items' ,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'des',
    ],
];

$showActions = true;
$actions[] = '{view} &nbsp; &nbsp; {update}&nbsp; &nbsp; {delete}';

if (Yii::$app->user->can('/groups/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/groups/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/groups/delete')) {
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

<div class="groups-index">

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
