<?php

namespace app\modules\admin\models;

//use app\modules\admin\services\AdminService;
use Yii;
use yii\base\Model;
use app\modules\admin\models\AdminModel;
use app\modules\admin\models\AdminIdentify;

/**
 * LoginForm is the model behind the login form.
 */
class AdminLoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],

//            ['verifyCode', 'captcha','captchaAction'=>'/index/captcha'],

        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($post_password,$password)
    {
        $adminModel=new AdminModel();
        return md5($adminModel->authKey.$post_password)==$password;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if($this->getUser()){
                return Yii::$app->admin->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            }else{
                Yii::$app->session['error_flash']="用户名或密码错误";
            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = AdminIdentify::findByUsername($this->username,$this->password);
        }
        return $this->_user;
    }
}
