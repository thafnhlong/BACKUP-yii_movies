<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use backend\models\Functional;
use backend\models\GroupFunctional;

/* @var $this yii\web\View */
/* @var $model backend\models\Groups */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin([
        'id' => 'groups-form',
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->textInput(['maxlength' => true]) ?>
    <div class="form-group field-groups-des">
        <?php 
            $list_functional = ArrayHelper::map(Functional::find()->all(),'id','name');
            
            $str_fnc_id = '';
            if($model->id != null){
                $fnc_selected = GroupFunctional::find()->where(array(
                    'group_id' => $model->id,
                ))->all();
            
                if(count($fnc_selected) > 0){
                    foreach($fnc_selected as $value){
                        $str_fnc_id .= $value->functional_id .',';
                    }
                    $str_fnc_id = substr($str_fnc_id,0,-1);
                }
            }
        ?>
        <?php echo Html::label('Quyền thao tác','Groups_functional',array('class' => 'control-label col-sm-3'))?>
        <div class="col-sm-6">
            <?php echo Html::dropDownList('Groups[functional]','',$list_functional,array(
                'multiple' => 'multiple',
                'style' => 'width:700px',
                'id' => 'Groups_functional'
            ));?>
        </div>
        
    </div>

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
<script>
   $(document).ready(function(){
      $("#Groups_functional").val([<?php echo $str_fnc_id?>]).select2({
         lang:'vi',
         allowClear: true,
      });
   });
</script>
