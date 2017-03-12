<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_group".
 *
 * @property integer $admin_id
 * @property integer $group_id
 */
class AdminGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'group_id'], 'required'],
            [['admin_id', 'group_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'group_id' => 'Group ID',
        ];
    }
}
