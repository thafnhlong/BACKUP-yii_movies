<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $create_date
 * @property integer $quantity
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_date'], 'safe'],
            [['quantity'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên hàng',
            'code' => 'Mã hàng',
            'create_date' => 'Ngày tạo',
            'quantity' => 'Số lượng',
        ];
    }
    
    /**
     * Log xuat-nhap-ton tat ca cac san pham
    */
    public function logIO(){
        
        if(date('m') == '01'){
            $monthly_ago = (date('Y') - 1)  . '-12'; // Kỳ trước
        }else{
            $monthly_ago = date('Y') . '-' . (date('m')-1); // Kỳ trước
        }
        $monthly    = date('Y-m'); // Kỳ này
        $start_time = date('Y-m') . '-01 00:00:00';
        $end_time   = date('Y-m-t').' 23:59:59';
        $last_update = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM product ORDER BY name ASC";
        $list = Yii::$app->db->createCommand($sql)->queryAll();
        
        if(count($list) > 0){
            $sql_queue = '';
            foreach($list as $value){
                $sql = "SELECT COALESCE(SUM(quantity),0) as total_quantity, COALESCE(SUM(quantity*price),0) as total_input_money FROM stock_in WHERE product_id = " . $value['id'] . " AND create_date >= '".$start_time."' AND create_date <= '".$end_time."'";
                $row = Yii::$app->db->createCommand($sql)->queryOne();
                $stock_in_quantity   = $row['total_quantity'];
                $total_input_money  = $row['total_input_money'];
                
                $sql = "SELECT COALESCE(SUM(quantity),0) as total_quantity, COALESCE(SUM(quantity*price),0) as total_output_money FROM stock_out WHERE product_id = " . $value['id'] . " AND create_date >= '".$start_time."' AND create_date <= '".$end_time."'";
                $row = Yii::$app->db->createCommand($sql)->queryOne();
                $stock_out_quantity   = $row['total_quantity'];
                $total_output_money  = $row['total_output_money'];
                
                //Tính tồn kho đầu kỳ
                $sql = "SELECT closing_stock FROM log_io WHERE product_id = {$value['id']} AND monthly='$monthly_ago'";
                $opening_stock = Yii::$app->db->createCommand($sql)->queryScalar();
                if($opening_stock == false){
                    $opening_stock = 0;
                }
                // Tồn kho cuối kỳ (tạm tính)
                $closing_stock = $stock_in_quantity + $opening_stock - $stock_out_quantity;
                /*
                $sql = "IF EXISTS(SELECT * FROM log_io WHERE product_id = 3 AND monthly = '$monthly')
                        THEN
                        	UPDATE log_io SET stock_in_quatity = $stock_in_quantity, stock_out_quantity = $stock_out_quantity, opening_stock = $opening_stock, closing_stock = $closing_stock, total_input_money = $total_input_money, total_output_money = $total_output_money, last_update = '$last_update' WHERE product_id = {$value['id']} AND monthly = '$monthly';
                        ELSE
                            INSERT INTO log_io(product_id,stock_in_quantity,stock_out_quantity,opening_stock,closing_stock,total_input_money,total_output_money,last_update,note,monthly) VALUES({$value['id']},$stock_in_quanity,$stock_out_quantity,$opening_stock,$closing_stock,$total_input_money,$total_output_money,'$last_update','','$monthly')";
                */
                
                $sql_queue .= "INSERT INTO log_io(product_id,stock_in_quantity,stock_out_quantity,opening_stock,closing_stock,total_input_money,total_output_money,last_update,note,monthly) VALUES({$value['id']},$stock_in_quantity,$stock_out_quantity,$opening_stock,$closing_stock,$total_input_money,$total_output_money,'$last_update','','$monthly')
                        ON DUPLICATE KEY UPDATE stock_in_quantity = $stock_in_quantity, opening_stock = $opening_stock, closing_stock = $closing_stock, total_input_money = $total_input_money, total_output_money = $total_output_money, last_update = '$last_update', note = '';";
                
                
            }
            if($sql_queue != ''){
                Yii::$app->db->createCommand($sql_queue)->execute();
            }
        }
    }
}
