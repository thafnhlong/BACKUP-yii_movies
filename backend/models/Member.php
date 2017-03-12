<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "member".
 *
 * @property string $id
 * @property string $display_name
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $phone_number
 * @property integer $is_admin
 * @property string $address
 * @property integer $status
 * @property integer $gender
 * @property string $birthday
 * @property integer $createdate
 * @property string $otp
 */
class Member extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_admin', 'status', 'gender', 'createdate'], 'integer'],
            [['birthday'], 'safe'],
            [['display_name', 'user_name', 'email', 'otp'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'display_name' => 'Display Name',
            'user_name' => 'User Name',
            'password' => 'Password',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'is_admin' => 'Is Admin',
            'address' => 'Address',
            'status' => 'Status',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'createdate' => 'Createdate',
            'otp' => 'Otp',
        ];
    }
    
    
    public static function login($user_name,$password){
        $password = md5($password);
        $row = static::findOne(['user_name' =>$user_name,'password' => $password]);
        return $row;
    }
    
    public function validatePassword($password){
        return true;
    }
}
