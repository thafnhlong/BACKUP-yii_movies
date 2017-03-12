<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock_in".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $quantity_sold
 * @property string $price
 * @property string $create_date
 * @property string $provider
 * @property integer $payment
 * @property string $note
 */
class StockIn extends \yii\db\ActiveRecord
{
    public $into_money; // Thành tiền
    public $list_payments = array(1 => 'Tiền mặt',2 => 'Chuyển khoản');
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'quantity','quantity_sold','payment'], 'integer'],
            [['price'], 'number'],
            [['create_date'], 'safe'],
            [['provider', 'note'], 'string'],
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
            'create_date' => 'Ngày nhập',
            'provider' => 'Đơn vị nhập hàng',
            'payment' => 'Hình thức thanh toán',
            'note' => 'Ghi chú',
            'into_money' => 'Thành tiền',
            'quantity_sold' => 'Đã bán'
        ];
    }
}
