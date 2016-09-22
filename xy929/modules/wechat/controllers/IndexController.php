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

        $wechatObj = new Wechat_Service();
        // $aa=$wechatObj->getAccessToken();
        // echo $aa;
        $wechatObj->responseMsg();
        exit;


//        if (isset($_GET['echostr'])) {
//            $wechatObj->valid();
//        }else{
//            echo $wechatObj->responseMsg();
//            exit;
//        }

    }

    //获取用户列表
    static function actionUser(){
        $wechatObj = new Wechat_Service();
        $token=$wechatObj->getAccessToken();
        $data=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$token);
        return $data;
        exit;
        
    }

    //获取用户基本信息
    static function actionUserinfo(){
        $wechatObj = new Wechat_Service();
        $token=$wechatObj->getAccessToken();
        //获取用户列表
        $user_list=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$token);
        $user_list=json_decode($user_list,1);
        if(!empty($user_list['data']['openid'])){
            foreach ($user_list['data']['openid'] as $key => $value) {
                $post['user_list'][$key]['openid']=$value;
                $post['user_list'][$key]['lang']='zh-CN';
            } 
            $url='https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$token;
            $return=$wechatObj->http_request($url,json_encode($post));
            var_dump(json_decode($return,1));     
        }else{
            echo "没有用户数据";
        }

        exit;
    }
    //自定义菜单
    public function actionMenu(){
        $wechatObj = new Wechat_Service();
        $token=$wechatObj->getAccessToken();
        $data=file_get_contents('https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$token);
        var_dump($data);
        exit;
    }
}
