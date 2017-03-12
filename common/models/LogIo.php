<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log_io".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $stock_in_quantity
 * @property integer $stock_out_quantity
 * @property integer $opening_stock
 * @property integer $closing_stock
 * @property string $total_input_money
 * @property string $total_output_money
 * @property string $last_update
 * @property string $note
 * @property string $monthly
 */
class LogIo extends \yii\db\ActiveRecord
{
    public $profit;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_io';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'stock_in_quantity', 'stock_out_quantity', 'opening_stock', 'closing_stock', 'total_input_money', 'total_output_money'], 'integer'],
            [['last_update'], 'safe'],
            [['note'], 'string'],
            [['monthly'], 'string', 'max' => 255],
            [['product_id', 'monthly'], 'unique', 'targetAttribute' => ['product_id', 'monthly'], 'message' => 'The combination of Product ID and Chu kỳ has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Mặt hàng',
            'stock_in_quantity' => 'Nhập (SP)',
            'stock_out_quantity' => 'Xuất (SP)',
            'opening_stock' => 'Tồn kho đầu kỳ',
            'closing_stock' => 'Tồn kho cuối kỳ',
            'total_input_money' => 'Tổng giá nhập',
            'total_output_money' => 'Doanh thu bán ra',
            'last_update' => 'Cập nhật',
            'note' => 'Note',
            'monthly' => 'Chu kỳ',
            'profit' => 'Lợi nhuận',
        ];
    }
}
