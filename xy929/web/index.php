<?php

// comment out the following two lines when deployed to production
//ssddsdsadsasdssd
class indexConfig{
    function indexRun(){
        require(__DIR__ . '/../vendor/autoload.php');
        require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

        $config = require(__DIR__ . '/../config/web.php');

        (new yii\web\Application($config))->run();
    }
}

