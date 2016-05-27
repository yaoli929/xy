<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-2-29
 * Time: 下午2:55
 * 入口文件
 */
require('xy929/web/index.php');
if (in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    //本地环境
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');

}else{
    //线上环境
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'prod');
}
$obj=new indexConfig;
$obj->indexRun();



