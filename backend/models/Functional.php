<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "functional".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $controller_id
 * @property string $action_id
 */
class Functional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'functional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'string', 'max' => 255],
            [['controller_id', 'action_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'controller_id' => 'Controller ID',
            'action_id' => 'Action ID',
        ];
    }
}
