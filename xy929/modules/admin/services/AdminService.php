<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-1
 * Time: 下午4:49
 */
namespace app\modules\admin\services;
use app\modules\admin\models\AdminModel;

class AdminService{
    static function getAdminUserById($admin_id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->findOne($admin_id);
        if($admin)
        {
            return $admin->getAttributes();
        }
        return false;
    }
//    public static function getAdminUserByToken($token)
//    {
//        $adminModel = new AdminModel();
//        $admin = $adminModel->findOne(['access_token'=>$token]);
//        if($admin)
//        {
//            return $admin->getAttributes();
//        }
//        return false;
//    }
    static function getAdminUserByName($user_name,$password)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->findOne(['username'=>$user_name]);
        if($admin)
        {
            if(md5($admin->authKey.$password)==$admin->password)
            {
                return $admin->getAttributes();
            }

        }
        return false;
    }



}