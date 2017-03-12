<?php

namespace common\components;

use Yii;
use \yii\filters\AccessControl;
class AccessRule extends \yii\filters\AccessRule {

    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!$user->getIsGuest() && $role === $user->identity->admin) {
                return true;
            }
        }

        return false;
    }
    
    
    private function getListUserByFunctional($controller_id,$action_id){
        $list = array();
        $sql = "SELECT admin FROM admin INNER JOIN admin_group ON admin.id = admin_group.admin_id WHERE group_id IN (
            	SELECT group_id FROM group_functional WHERE functional_id IN(
            		SELECT id FROM functional WHERE controller_id = '$controller_id' and action_id = '$action_id'
            	)
            )";
        $db = Yii::$app->db;
        $cmd = $db->createCommand($sql);
        $result = $cmd->queryAll();
        if(count($result) > 0){
            foreach($result as $value){
                $list[] = $value['admin'];
            }
        }
        return $list;
    }
    
    
    public function getListActionByController($controller_id){
        $list = array();
        $db = Yii::$app->db;
        $sql = "SELECT action_id FROM functional WHERE controller_id = '$controller_id'";
        $result = $db->createCommand($sql)->queryAll();
        
        if(count($result) > 0){
            foreach($result as $value){
                $list[] = $value['action_id'];
            }
        }
        return $list;
    }
    
    public function behaviors($controller_id){
        
        $list_actions = $this->getListActionByController($controller_id);
        
        $rules = [
            [
                'allow' => true,
                'roles' => ['tavanchinh','admin'],
            ],
        ];
        
        if(count($list_actions) > 0){
            foreach($list_actions as $value){
                $list_users = $this->getListUserByFunctional($controller_id,$value);
                
                $allow = array('allow' => true,
                    'actions'=>array($value),
                    'roles'=>$list_users,
                
                );
                $rules[] = $allow;
            }
        }
        
        //$rules[] = $list;
        $rules[] = [
            'allow' => false,
            'roles' => ['*'],
        ];
        
        //dd($rules);
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => parent::className(),
                ],
                'only' => ['*'],
                'rules' => $rules,
                
            ],
        ];
        
        
    }
}
?>