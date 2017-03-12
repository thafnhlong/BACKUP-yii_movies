<?php

use yii\helpers\Html;
use dmstr\widgets\Box;

/* @var $this yii\web\View */
/* @var $model backend\models\Functional */

$this->title = 'Create Functional';
$this->params['breadcrumbs'][] = ['label' => 'Functionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functional-create">

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
