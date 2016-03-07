<?php

namespace app\modules\admin\models;
use app\modules\admin\models\AdminModel;
use app\modules\admin\services\AdminService;

class AdminIdentify extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $status=10;
    public $create_time;
    public $update_time;
    public $authKey="xy929";
    public $accessToken;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $return=AdminService::getAdminUserById($id);
        return $return ? new static($return):null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $adminModel=new AdminModel();
        $return=$adminModel::find()->where(['accessToken' => $token])->one();
        return $return ? new static($return->getAttributes()) : null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username,$password)
    {
        $return=AdminService::getAdminUserByName($username,$password);
        return $return ? new static($return):null;

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
