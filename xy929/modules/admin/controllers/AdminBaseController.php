<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-2-29
 * Time: 下午5:13
 */
namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

// admin模块总控制器
class AdminBaseController extends Controller
{

    public $layout = 'dashboard';
    //访问权限控制
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','captcha'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => '',
                        'matchCallback' => function ($rule, $action) {
                                if (!\Yii::$app->admin->isGuest) {
                                    return true;
                                }
                            }
                    ],
                ],
                //被阻止后的回调 , 暂时抛出异常
                //todo........
                'denyCallback' => function ($rule, $action) {
                        $this->redirect('/admin/login');
                        // throw new \Exception('您没有被允许访问这个页面!！');
                    }
            ],
        ];
    }

    /*
     *验证码
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0xFFFFFF,  //背景颜色
                'minLength'=>6,  //最短为4位
                'maxLength'=>6,   //是长为4位
                'transparent'=>true,  //显示为透明
                'testLimit'=>0,
            ],
        ];
    }

    /**
     * @param  mixed $code
     * @param  mixed $msg
     * @param  array $result
     * @return void
     */
    protected function _ajaxMessage($code, $msg, $result = array())
    {
        // echo 123;die;
        $return = array(
            'code' => $code,
            'msg' => $msg,
            'result' => $result
        );
        echo json_encode($return);
        exit();
    }

    /**
     * _popSuccessFlash
     * 弹出一条flash成功信息
     * @return void
     */
    public function _popSuccessFlash() {

        $result = '';
        if (Yii::$app->session['success_flash']) {
            $result = Yii::$app->session['success_flash'];
            unset(Yii::$app->session['success_flash']);
        }
        return $result;
    }

    /**
     * _popErrorFlash
     * 弹出一条flash警告信息
     * @return void
     */
    public function _popErrorFlash() {

        $result = '';
        if (Yii::$app->session['error_flash']) {
            $result = Yii::$app->session['error_flash'];
            unset(Yii::$app->session['error_flash']);
        }
        return $result;
    }

    /**
     * _setSuccessFlash
     * 设置flash消息
     * @param  mixed $msg
     * @return void
     */
    public function _setSuccessFlash($msg) {
        return Yii::$app->session['success_flash'] = $msg;
    }

    /**
     * _setErrorFlash
     * 设置flash消息
     * @param  mixed $msg
     * @return void
     */
    public function _setErrorFlash($msg) {
        return Yii::$app->session['error_flash'] = $msg;
    }


}
