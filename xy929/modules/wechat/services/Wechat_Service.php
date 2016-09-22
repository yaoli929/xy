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

    // private $appId="wx25e81996cfd3d26b";
    // private $appSecret="d8060e08cbddb3a359acdca95d02ac7d";

    //测试号
    private $appId="wxdc7d03e1f5982bbb";
    private $appSecret="d4624c36b6795d1d99dcf0547af5443d";

    //获取access_token
    public function getAccessToken(){
        $token_model=AccessTokenModel::findOne(1);
        if(empty($token_model)){
            $token_model=new AccessTokenModel();
        }else{
            $access_token=$token_model->toArray();
        }
        
        if(empty($access_token['access_token']) || (time()>($access_token['expire_time']+$access_token['update_time']))){
            //添加或者更新access_token
            $return=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret);
            $data=json_decode($return,1);
            $token_model->access_token=$data['access_token'];
            $token_model->expire_time=$data['expires_in'];
            $token_model->save();
            return $data['access_token'];
        }else{
            return $access_token['access_token'];
        }
    }


    //验证服务器地址是否正确
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

    //文本消息自动回复
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
            if(!empty($keyword))
            {
                $msgType = "text";
                $contentStr = "你是不是傻啊，哈哈哈啊哈哈";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "玛德智障";
            }
            exit;

        }else {
            echo "";
            exit;
        }
    }

    //发送请求
    public function http_request($url, $data_json='')
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json))
        );
         
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;

    }

}