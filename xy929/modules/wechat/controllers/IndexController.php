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
    public function actionIndex()
    {
        $wechatObj = new Wechat_Service();
        $wechatObj->valid();
//        $wechatObj->responseMsg();


//        if (isset($_GET['echostr'])) {
//            $wechatObj->valid();
//        }else{
//            echo $wechatObj->responseMsg();
//            exit;
//        }

    }
}
