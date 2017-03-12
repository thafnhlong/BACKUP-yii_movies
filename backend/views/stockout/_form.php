<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\StockOut */
/* @var $form yii\bootstrap\ActiveForm */
$product = new Product;
?>
<?php 
  if(!$model->isNewRecord){
     $product_id = $model->product_id;
     $row = Product::findOne([
        'id' => $product_id
     ]);
     
     $row_default['id'] = $product_id;
     $row_default['text'] = $row->name;      
     
  }else{
     $product_id = '';
     $row_default = array();
  }
?>
<div class="stock-out-form">

    <?php $form = ActiveForm::begin([
        'id' => 'stock-out-form',
        'layout' => 'horizontal',
    ]); ?>
    <?= $form->field($model, 'product_id')->hiddenInput([
        'class' => 'select2-container',
        'style' => 'width:100%',
    ]) ?>

    <?= $form->field($model, 'quantity')->textInput([
        'style' => 'max-width:200px',
        'type' => 'number',
    ]) ?>
    
    <div class="form-group field-stockout-price">
        <label class="control-label col-sm-3" for="stockout-price">Đơn giá</label>
        <div class="col-sm-6">
            <input type="hidden" id="stockout-price" value="<?php echo $model->price?>" class="form-control" name="StockOut[price]">
            <input type="text" value="<?php echo number_format($model->price,0,'.',',')?>"  class="currency form-control" style="max-width: 200px;" />
            <div class="help-block help-block-error "></div>
        </div>
    
    </div>
    
    <?= $form->field($model, 'create_date')->textInput([
        'class' => 'datetimepicker form-control',
        'style' => 'max-width:200px'
    ]) ?>
    <?= $form->field($model, 'customer')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'payment')->dropDownList($model->list_payments,[
        'style' => 'max-width:200px'
    ]) ?>
    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


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
    function formatNumber(s) {
        if(s == ''){
            return s;
        }
        var n = parseInt(s.replace(/\D/g,''),10);
        var format = n.toLocaleString('ja-JP');
        return format;
    }

    $(document).ready(function(){
        $('.currency').keyup(function(){
            var price = $(this).val();
            var plain_price = price.replace(/,/g,'');
            $("#stockout-price").val(plain_price);
            var number = formatNumber(price);
            $(this).val(number);
        })
        $('.datetimepicker').datetimepicker({
            format:'Y-m-d',
            lang:'vi',
            timepicker:false,
        });
      
      
        var def_row = <?php echo json_encode($row_default)?>; 
        <?php if($product_id != ''){?>
            $("#stockout-product_id").val(<?php echo $model->product_id?>).select2({
        <?php }else{ ?>
            $("#stockout-product_id").select2({
        <?php  }?> 
             lang:'vi',
             multiple: false,
             placeholder: "Nhập tên sản phẩm",
             tokenSeparators: [','],
             createSearchChoicePosition: 'bottom',
             minlength:1,
             ajax:{
                url: "/backend/product/autocomplete",
                dataType: "json",
                type: "POST",
                data: function (term, page) {
                   return {
                      term: term,
                   };
                },
                results: function (data, page) {
                   //lastResults = data.results;
                   var arr = new Array();
                   $(data).each(function (i, items) {
                     arr.push({
                         text: items.label,
                         id: items.id
                     });
                   });
                   return {
                     results: arr
                   };
                }
             },
             initSelection: function (element, callback) {
                var data = def_row
                callback(data);
             },
      });
       
   })

</script>
