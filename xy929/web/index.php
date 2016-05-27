<?php

// comment out the following two lines when deployed to production
class indexConfig{
    function indexRun(){
        require(__DIR__ . '/../vendor/autoload.php');
        require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

        $config = require(__DIR__ . '/../config/web.php');

        Yii::setAlias('@webcss', '/xy929/web/css');
        Yii::setAlias('@webjs', '/xy929/web/js');
        Yii::setAlias('@webimg', '/xy929/web/img');

        (new yii\web\Application($config))->run();
    }
}

