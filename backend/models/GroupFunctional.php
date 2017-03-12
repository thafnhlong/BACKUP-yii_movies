<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "group_functional".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $functional_id
 */
class GroupFunctional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_functional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'functional_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'functional_id' => 'Functional ID',
        ];
    }
}
