<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-2-29
 * Time: 下午5:13
 */
namespace app\modules\wechat\controllers;

use Yii;
use yii\web\Controller;

// 微信模块总控制器
class IndexController extends Controller
{

    public function actionIndex()
    {
        define("TOKEN","yaoli929");
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            //验证成功
            echo $_GET['echostr'];
        }else{
            return false;
        }
    }

}
