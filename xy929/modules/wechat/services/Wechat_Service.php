<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/26
 * Time: 13:54
 */
namespace app\modules\wechat\services;
use app\modules\wechat\models\AccessTokenModel;
define("TOKEN", "xiaoyao929");
class Wechat_Service{
    private $appId="wx25e81996cfd3d26b";
    private $appSecret="d8060e08cbddb3a359acdca95d02ac7d";

    public function getAccessToken(){
        //获取access_token
        $token_model=new AccessTokenModel();
        $access_token=$token_model->find()->one()->attributes;

        if(empty($access_token['access_token']) || time()>($access_token['expire_time']+$access_token['create_time'])){
            //添加或者更新access_token
            $return=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret);
            $data=json_decode($return,1);
            $token_model->access_token=$data['access_token'];
            $token_model->expire_time=$data['expires_in'];
            if(!empty($access_token['id'])){
                $token_model->id=$access_token['id'];
            }
            $token_model->save();
            return $data['access_token'];
        }else{
            return $access_token['access_token'];
        }
    }
    public function valid() {

        if($this->checkSignature()){
            echo $_GET["echostr"];
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }

}