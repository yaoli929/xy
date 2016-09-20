<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-2-29
 * Time: 下午5:13
 */
namespace app\modules\wechat\controllers;

use app\modules\wechat\services\Wechat_Service;
use Yii;
use yii\web\Controller;


// 微信模块总控制器
class IndexController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        // Ylx4kqov1r9WYXc7tNgtc3zj9HY-zN3Tay1gntixofZMaqAfWSElvrOcwGb7s-ZqHVal--04QMenvBfUo_ZbtRrG5GhUfX0RnTlQyZIcGRCsrNvnQ_l2ZOoZyo6derjLDZXfAIAMIG

        $wechatObj = new Wechat_Service();
        $aa=$wechatObj->getAccessToken();
        echo $aa;
        // $wechatObj->responseMsg();
        exit;


//        if (isset($_GET['echostr'])) {
//            $wechatObj->valid();
//        }else{
//            echo $wechatObj->responseMsg();
//            exit;
//        }

    }
}
