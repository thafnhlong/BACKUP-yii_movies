<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Groups;
use backend\models\AdminGroup;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin([
        'id' => 'admin-form',
        'layout' => 'horizontal',
    ]); ?>
    <?= $form->field($model, 'admin')->textInput(['maxlength' => true])->label('Account') ?>
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Password'); ?>
    
    
    <div class="form-group field-groups-des">
        <?php 
            $list_all = ArrayHelper::map(Groups::find()->all(),'id','name');
            
            $str_id = '';
            if($model->id != null){
                $selected = AdminGroup::find()->where(array(
                    'admin_id' => $model->id,
                ))->all();
            
                if(count($selected) > 0){
                    foreach($selected as $value){
                        $str_id .= $value->group_id .',';
                    }
                    $str_id = substr($str_id,0,-1);
                }
            }
        ?>
        <?php echo Html::label('Group','Admin_group',array('class' => 'control-label col-sm-3'))?>
        <div class="col-sm-6">
            <?php echo Html::dropDownList('Admin[group]','',$list_all,array(
                'multiple' => 'multiple',
                'style' => 'width:700px',
                'id' => 'Admin_group'
            ));?>
        </div>
        
    </div>
    <?= $form->field($model, 'status')->checkbox() ?>
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
      $("#Admin_group").val([<?php echo $str_id?>]).select2({
         lang:'vi',
         allowClear: true,
      });
   });
</script>