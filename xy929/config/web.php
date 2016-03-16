<?php

$params = require(__DIR__ . '/params.php');
$path= require(__DIR__ . '/path.php');
//引入数据库
if(YII_ENV_DEV){
    $db=require(__DIR__ . '/db.php');
}else{
    $db=require(__DIR__ . '/dbp.php');
}

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'index/index',
    'timeZone'=>'Asia/Shanghai',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\admin',
        ],
        'wechat' => [
            'class' => 'app\modules\wechat\wechat',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ek7SUg7qeQ80Z3p-6nNYJAPSLxugTy88',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'idParam'         => '_user',
        ],
        'admin' => array(   // Webuser for the admin area (admin)
            'class'             => '\yii\web\User',
            'loginUrl'          => array('/admin/index/login'),
            'identityClass'     => 'app\modules\admin\models\AdminIdentify',
            'idParam'           => '_admin',
            'enableAutoLogin' => true,
            'identityCookie'    => ['name'=>'_admin','httpOnly' => true],
        ),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => $path,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1']
    ];
}

return $config;
