<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock_out".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $quantity
 * @property string $price
 * @property string $create_date
 * @property string $note
 * @property string $customer
 * @property integer $payment
 */
class StockOut extends \yii\db\ActiveRecord
{
    public $list_payments = array(1 => 'Tiền mặt',2 => 'Chuyển khoản');
    public $into_money;             // Thành tiền
    public $total_money_stock_in;   //Tổng giá nhập
    public $profit;                 // Lợi nhuận
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'quantity', 'payment'], 'integer'],
            [['price'], 'number'],
            [['create_date'], 'safe'],
            [['note', 'customer'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Sản phẩm',
            'quantity' => 'Số lượng',
            'price' => 'Đơn giá',
            'create_date' => 'Ngày bán',
            'note' => 'Note',
            'customer' => 'Khách hàng',
            'payment' => 'Hình thức thanh toán',
            'into_money' => 'Thành tiền',
            'total_money_stock_in' => 'Tổng giá nhập',
            'profit' => 'Lợi nhuận',
        ];
    }
    
    public function log($id){
        
        //Số lượng đang được bán ra
        $sql = "SELECT quantity, product_id FROM " . $this->tableName() . " WHERE id =".$id;
        $row = Yii::$app->db->createCommand($sql)->queryOne(); 
        $quantity_stock_out = $row['quantity'];
        $product_id = $row['product_id'];
        
        //Duyệt qua các lần nhập, mặt hàng nào nhập trước sẽ được bán trước
        $sql = "SELECT * FROM stock_in WHERE product_id = $product_id AND quantity <> quantity_sold ORDER BY id ASC";
        $list = Yii::$app->db->createCommand($sql)->queryAll(); 
        //dd($quantity_stock_out);
        if(count($list) > 0){
            $total = 0;
            $x = 0;
            $y = 0;
            foreach($list as $value){
                $x += $value['quantity'] - $value['quantity_sold'];
                
                if($x <= $quantity_stock_out){
                    $sql = "UPDATE stock_in SET quantity_sold = ".$value['quantity']." WHERE id=".$value['id'];
                    Yii::$app->db->createCommand($sql)->execute();
                    
                    $quantity = $value['quantity'] - $value['quantity_sold'];
                    $sql = "INSERT INTO log_stock_out (stock_out_id,product_id,quantity,price,stock_in_date) VALUES($id,$product_id,$quantity,{$value['price']},'{$value['create_date']}')";
                    Yii::$app->db->createCommand($sql)->execute();
                    
                }else{
                    $quantity = $quantity_stock_out-$y;
                    $sql = "UPDATE stock_in SET quantity_sold = quantity_sold+".$quantity." WHERE id=".$value['id'];
                    Yii::$app->db->createCommand($sql)->execute();
                    
                    $sql = "INSERT INTO log_stock_out (stock_out_id,product_id,quantity,price,stock_in_date) VALUES($id,$product_id,$quantity,{$value['price']},'{$value['create_date']}')";
                    Yii::$app->db->createCommand($sql)->execute();
                    break;
                }
                $y = $x;
            }
            
            
        }
    }
    
    /**
     * Tinh tong gia nhap
    */
    public function getTotalMoneyStockIn($id){
        $sql = "SELECT SUM(price*quantity) AS money FROM log_stock_out WHERE stock_out_id =".$id;
        $this->total_money_stock_in = Yii::$app->db->createCommand($sql)->queryScalar();
        return $this->total_money_stock_in;
    }
    
    /**
     * Tinh loi nhuan
    */
    public function getProfit($id,$into_money){
        return $into_money - $this->total_money_stock_in ;
    }
}
